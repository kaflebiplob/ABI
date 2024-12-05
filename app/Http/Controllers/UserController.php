<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login()
    {
        return view('authentication.login');
    }
    function loginsubmit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|max:15',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if ($user->usertype === 'admin') {
                return redirect()->route('admin')->with('success', 'Welcome back admin');
            } else {
                return redirect()->route('index')->with("success','weleome back.");
            }
        }

        return redirect()->route('login')->with('error', 'Invalid credentials.');
    }

    function register()
    {
        return view('authentication.register');
    }
    function registersubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:15',
            'phone' => 'required|digits:10|unique:users,phone',
            'address' => 'required',

        ]);
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->usertype = $request->input('usertype', 'user'); 
            $user->save();

            return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Failed to register. Please try again.');
        }
    }
}
