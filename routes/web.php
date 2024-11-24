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
    Route::get('/edit_category/{id}', [AdminController::class, 'edit_category'])->name('edit_category');
    Route::post('/editcategory/{id}', [AdminController::class, 'editcategory'])->name('editcategory');
    Route::post('/deletecategory/{id}', [AdminController::class, 'deletecategory'])->name('deletecategory');



    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/addproduct', [AdminController::class, 'addproduct'])->name('addproduct');
    Route::post('/addproductsubmit',[AdminController::class,'addproductsubmit'])->name('addproductsubmit');



    Route::get('/brands', [AdminController::class, 'brands'])->name('brands');
    Route::get('/addbrands', [AdminController::class, 'addbrands'])->name('addbrands');
    Route::post('/addbrandssubmit', [AdminController::class, 'addbrandssubmit'])->name('addbrandssubmit');
    Route::get('/editbrands/{id}', [AdminController::class, 'editbrands'])->name('editbrands');
    Route::post('/editbrandssubmit/{id}', [AdminController::class, 'editbrandssubmit'])->name('editbrandssubmit');
    Route::post('/deletebrands/{id}', [AdminController::class, 'deletebrands'])->name('deletebrands');
});
