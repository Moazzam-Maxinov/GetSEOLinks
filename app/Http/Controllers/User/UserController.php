<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\PublisherOrder;

class UserController extends Controller
{
    public function dashboard()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch the role from the customer_role table
        $customerRole = CustomerRole::where('user_id', $user->id)->first();

        // Set the role (default to 'vendor' if no role is found)
        $role = $customerRole ? $customerRole->role : 'vendor';

        // Pass the role to the view
        return view('user.dashboard', compact('role'));
    }

    // Render the change password form
    public function showChangePasswordForm()
    {
        return view('user.change-password'); // Create this view
    }

    // Handle password change request
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        // Update the password
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.change-password')->with('status', 'Password changed successfully.');
    }


    //API Routes
    public function fetchDashboardData(Request $request)
    {
        $role = $request->query('role', 'vendor'); // Default to vendor
        if ($role === 'vendor') {
            return response()->json($this->getVendorData());
        } elseif ($role === 'publisher') {
            return response()->json($this->getPublisherData());
        }
        return response()->json(['error' => 'Invalid role'], 400);
    }

    public function getVendorData()
    {
        return "Vendor";
    }

    public function getPublisherData()
    {
        return "Publisher";
    }

    public function switchRole(Request $request)
    {
        // Validate the request
        $request->validate([
            'role' => 'required|in:vendor,publisher',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update or create the role in the customer_role table
        CustomerRole::updateOrCreate(
            ['user_id' => $user->id], // Find by user_id
            ['role' => $request->input('role')] // Update or create with the new role
        );

        // Return a success response
        return response()->json(['success' => true]);
    }

    public function getPublisherDashbordData()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        $pendingOrderCount = PublisherOrder::where('ordered_to', $userId)
            ->where('status', 'pending')
            ->count();

        $totalOrderCount = PublisherOrder::where('ordered_to', $userId)->count();

        $totalCompletedSum = PublisherOrder::where('ordered_to', $userId)
            ->where('status', 'completed')
            ->sum('price');

        $inPprogressOrderCount = PublisherOrder::where('ordered_to', $userId)
            ->where('status', 'inprogress')
            ->count();

        $data = [
            'total_orders' =>  $totalOrderCount,
            'new_orders' => $pendingOrderCount,
            'total_amount_spent' => $totalCompletedSum,
            'inprogress_orders' => $inPprogressOrderCount,
        ];

        return response()->json($data);
    }
}
