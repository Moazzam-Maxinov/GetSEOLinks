<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     dd("Hello");
    //     // First validate reCAPTCHA
    //     $recaptcha_response = $request->input('g-recaptcha-response');

    //     $recaptcha_verify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
    //         'secret' => env('RECAPTCHA_SECRET_KEY'),
    //         'response' => $recaptcha_response
    //     ]);

    //     $recaptcha_verify = $recaptcha_verify->json();

    //     if (!$recaptcha_verify['success'] || $recaptcha_verify['score'] < 0.5) {
    //         return back()
    //             ->withInput()
    //             ->withErrors(['recaptcha' => 'Failed to validate reCAPTCHA. Please try again.']);
    //     }
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(RouteServiceProvider::HOME);
    // }


    //Captcha Working function but email registered already error not showing
    // public function store(Request $request): RedirectResponse
    // {
    //     // Log the incoming request data - Becareful this logs the assword also
    //     // Log::info('Registration attempt', $request->all());

    //     // Validate reCAPTCHA
    //     $recaptcha_response = $request->input('g-recaptcha-response');

    //     if (!$recaptcha_response) {
    //         Log::error('No reCAPTCHA response received');
    //         return back()
    //             ->withInput()
    //             ->withErrors(['recaptcha' => 'Please complete the reCAPTCHA verification.']);
    //     }

    //     try {
    //         $recaptcha_verify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
    //             'secret' => env('RECAPTCHA_SECRET_KEY'),
    //             'response' => $recaptcha_response
    //         ]);

    //         $recaptcha_verify = $recaptcha_verify->json();

    //         // Log the reCAPTCHA response
    //         Log::info('reCAPTCHA verification response', $recaptcha_verify);

    //         if (!$recaptcha_verify['success'] || ($recaptcha_verify['score'] ?? 0) < 0.5) {
    //             Log::error('reCAPTCHA validation failed', $recaptcha_verify);
    //             return back()
    //                 ->withInput()
    //                 ->withErrors(['recaptcha' => 'Failed to validate reCAPTCHA. Please try again.']);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('reCAPTCHA verification error', ['error' => $e->getMessage()]);
    //         return back()
    //             ->withInput()
    //             ->withErrors(['recaptcha' => 'Error validating reCAPTCHA. Please try again.']);
    //     }

    //     // Regular validation
    //     try {
    //         $validated = $request->validate([
    //             'name' => ['required', 'string', 'max:255'],
    //             'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    //             'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         ]);

    //         $user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //         ]);

    //         event(new Registered($user));

    //         Auth::login($user);

    //         // Log::info('User registered successfully', ['user_id' => $user->id]);

    //         return redirect(RouteServiceProvider::HOME);
    //     } catch (\Exception $e) {
    //         Log::error('Registration error', ['error' => $e->getMessage()]);
    //         return back()
    //             ->withInput()
    //             ->withErrors(['registration' => 'Error during registration. Please try again.']);
    //     }
    // }

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

            Log::info('reCAPTCHA verification response', $recaptcha_verify);

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

        // Regular validation
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (ValidationException $e) {
            // This will properly handle validation errors and return them to the view
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
}
