<?php

namespace App\Http\Controllers\User;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show Profile View
     */
    public function profileView()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Handle Profile Change
     */
    public function profileChange(Request $request)
    {
        $user = Auth::user();

        // Handle image upload
        $imageName = FileHelper::uploadImage($request, $user);

        // Debugging statement: Check if image upload was successful
        \Log::info('Profile updated: Image Name - ' . $imageName);

        // Update user data
        $user->fill([
            'name' => $request->input('name'),
            'image' => $imageName ? $imageName : $user->image, // Keep existing image if no new one is uploaded
        ])->save();

        // Debugging statement: Check user update status
        \Log::info('Profile update complete for user: ' . $user->id);

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Handle Password Change
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verify old password
        if (!Hash::check($request->oldpassword, $user->password)) {
            return back()->withErrors(['oldpassword' => 'The current password is incorrect.']);
        }

        // Update new password
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }
}
