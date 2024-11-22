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
                return redirect()->route('login')->with("success','weleome back.");
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
            'email' => 'required|email',
            'password' => 'required|min:8|max:15',
            'phone' => 'required|digits:10',
            'address' => 'required',

        ]);
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->save();
        if ($users->usertype === 'admin') {
            return redirect()->route('admin');
        } else {
            return redirect()->route('login');
        }
    }
}
