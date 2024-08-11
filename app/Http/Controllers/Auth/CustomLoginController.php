<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Create a login form view
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            

            // $sss=Auth::user()->name;

            // dd( $sss);
            // Authentication passed...
            return redirect()->route('dashboard'); // Redirect to your dashboard route
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
