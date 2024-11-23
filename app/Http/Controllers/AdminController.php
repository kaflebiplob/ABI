<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function admin()
    {
        return view('admin.dashboard');
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    function category()
    {
        return view('admin.category');
    }
}
