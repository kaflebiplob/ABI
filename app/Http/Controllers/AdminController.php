<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function admin(){
        return view('admin.dashboard');
    }
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
