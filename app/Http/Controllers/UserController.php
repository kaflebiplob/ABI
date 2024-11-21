<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function login(){
        return view('authentication.login');
    }
    function register(){
        return view('authentication.register');
    }
}
