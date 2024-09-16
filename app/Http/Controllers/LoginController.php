<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function signIn() {
        return view('login');
    }


            public function login(Request $request) {
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                // Attempt to log the user in
                if (Auth::attempt([
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                ])) {
                    // Authentication passed
                    $request->session()->regenerate();
                    return redirect()->route('admin');
                }

                // Authentication failed
                return redirect()->back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->withInput();
            }
}
