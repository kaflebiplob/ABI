<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');





// Admin-----------------------------------------------------------

Route::get('/admin/dashboard',[AdminController::class,'admin'])->name('admin');