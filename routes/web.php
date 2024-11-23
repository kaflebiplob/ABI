<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/loginsubmit', [UserController::class, 'loginsubmit'])->name('loginsubmit');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registersubmit', [UserController::class, 'registersubmit'])->name('registersubmit');





// Admin-----------------------------------------------------------
Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin/dashboard', [AdminController::class, 'admin'])->name('admin');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('category', [AdminController::class, 'category'])->name('category');
    Route::get('addcategory', [AdminController::class, 'addcategory'])->name('addcategory');
    Route::post('/addcategorysubmit', [AdminController::class, 'addcategorysubmit'])->name('addcategorysubmit');
});
