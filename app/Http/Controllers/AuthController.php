<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Toastr;
class AuthController extends Controller
{
    // Display the login form
    public function showLoginForm()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // Check if the user exists and verify the password
        $user = \App\Models\User::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user); // Log in the user
            $request->session()->regenerate();
    
            Toastr::success('Logged in successfully!', 'Success');
            return redirect()->intended('/');
        }
    
        // Return errors if authentication fails
        Toastr::error('The provided email or password is incorrect.', 'Error');
        return redirect()->back()->withInput(['email' => $request->email]);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        // Invalidate the session
        $request->session()->invalidate();
        // Regenerate the CSRF token to prevent attacks
        $request->session()->regenerateToken();
        Toastr::success('Logged out successfully!', 'Success');
        return redirect('/login');
    }
    

}
