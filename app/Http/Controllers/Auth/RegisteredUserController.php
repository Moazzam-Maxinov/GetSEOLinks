<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PendingRegistration;
use App\Notifications\VerifyRegistrationEmail;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate reCAPTCHA
        $recaptcha_response = $request->input('g-recaptcha-response');

        if (!$recaptcha_response) {
            Log::error('No reCAPTCHA response received');
            return back()
                ->withInput()
                ->withErrors(['recaptcha' => 'Please complete the reCAPTCHA verification.']);
        }

        try {
            $recaptcha_verify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $recaptcha_response
            ]);

            $recaptcha_verify = $recaptcha_verify->json();

            if (!$recaptcha_verify['success'] || ($recaptcha_verify['score'] ?? 0) < 0.5) {
                Log::error('reCAPTCHA validation failed', $recaptcha_verify);
                return back()
                    ->withInput()
                    ->withErrors(['recaptcha' => 'Failed to validate reCAPTCHA. Please try again.']);
            }
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification error', ['error' => $e->getMessage()]);
            return back()
                ->withInput()
                ->withErrors(['recaptcha' => 'Error validating reCAPTCHA. Please try again.']);
        }

        try {
            // First validate basic requirements
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // Check if email exists in users table
            if (User::where('email', $request->email)->exists()) {
                throw ValidationException::withMessages([
                    'email' => ['This email address is already registered.'],
                ]);
            }

            // Check for existing pending registration
            $existingPending = PendingRegistration::where('email', $request->email)->first();

            if ($existingPending) {
                // If token has expired, delete it and continue with new registration
                if ($existingPending->expires_at < now()) {
                    $existingPending->delete();
                } else {
                    // If token is still valid, inform user
                    return redirect('/login')->with(
                        'status',
                        'A verification email has already been sent to this address. Please check your inbox or wait for the current verification to expire (24 hours from initial registration).'
                    );
                }
            }

            // Create pending registration
            $verificationToken = Str::random(64);
            $pendingRegistration = PendingRegistration::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'verification_token' => $verificationToken,
                'expires_at' => now()->addHours(24),
            ]);

            Log::info('Created pending registration', ['email' => $request->email]);

            // Generate verification URL
            $verificationUrl = route('registration.verify', ['token' => $verificationToken]);

            Log::info('Generated verification URL', ['url' => $verificationUrl]);

            try {
                // Send verification email
                Notification::route('mail', $request->email)
                    ->notify(new VerifyRegistrationEmail($verificationUrl));

                Log::info('Verification email sent successfully', ['email' => $request->email]);
            } catch (\Exception $e) {
                // If email fails to send, delete the pending registration
                $pendingRegistration->delete();
                Log::error('Failed to send verification email', [
                    'email' => $request->email,
                    'error' => $e->getMessage()
                ]);
                throw $e;
            }

            // Use absolute path for redirect
            return redirect('/login')->with(
                'status',
                'Registration pending. Please check your email to verify your account.'
            );
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            Log::error('Registration error', ['error' => $e->getMessage()]);
            return back()
                ->withInput()
                ->withErrors(['email' => 'Error during registration. Please try again.']);
        }
    }

    public function verifyEmail(Request $request)
    {
        try {
            $pendingRegistration = PendingRegistration::where('verification_token', $request->token)
                ->where('expires_at', '>', now())
                ->firstOrFail();

            // Additional check to ensure email is still unique in users table
            if (User::where('email', $pendingRegistration->email)->exists()) {
                $pendingRegistration->delete();
                return redirect('/login')
                    ->with('error', 'This email has already been registered. Please login or use a different email.');
            }

            // Create the actual user
            $user = User::create([
                'name' => $pendingRegistration->name,
                'email' => $pendingRegistration->email,
                'password' => $pendingRegistration->password,
                'email_verified_at' => now(),
            ]);

            // Send notification email to manager
            Mail::raw("New user registration: {$user->name} ({$user->email})", function ($message) {
                $message->to(['shaheen@maxinov.com', 'moazzam@maxinovip.com', 'smohd@maxinov.com'])
                    ->subject('New User Registration');
            });

            // Delete the pending registration
            $pendingRegistration->delete();

            // Log the user in
            Auth::login($user);

            return redirect(RouteServiceProvider::HOME)
                ->with('status', 'Your email has been verified and your account has been created successfully.');
        } catch (\Exception $e) {
            Log::error('Verification error', ['error' => $e->getMessage()]);
            return redirect('/login')
                ->with('error', 'Invalid or expired verification link. Please try registering again.');
        }
    }
}
