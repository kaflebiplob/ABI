<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/loginsubmit', [UserController::class, 'loginsubmit'])->name('loginsubmit');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/registersubmit', [UserController::class, 'registersubmit'])->name('registersubmit');
});
// User------------------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/shop', [HomeController::class, 'products'])->name('products');
Route::get('/productdetail/{id}', [HomeController::class, 'productdetail'])->name('productdetail');
Route::get('/contactus',[HomeController::class,'contactus'])->name('contactus');
Route::post('/contactussubmit',[HomeController::class,'sendmessage'])->name('contactussubmit');


Route::group(['middleware' => 'auth'], function () {
    Route::post('/userlogout', [HomeController::class, 'userlogout'])->name('userlogout');
});


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



    Route::get('/product_list', [AdminController::class, 'products'])->name('product_list');
    Route::get('/addproduct', [AdminController::class, 'addproduct'])->name('addproduct');
    Route::post('/addproductsubmit', [AdminController::class, 'addproductsubmit'])->name('addproductsubmit');
    Route::get('/editproduct/{id}', [AdminController::class, 'editproduct'])->name('editproduct');
    Route::post('/editproductsubmit/{id}', [AdminController::class, 'editproductsubmit'])->name('editproductsubmit');
    Route::post('/deleteproduct/{id}', [AdminController::class, 'deleteproduct'])->name('deleteproduct');



    Route::get('/brands', [AdminController::class, 'brands'])->name('brands');
    Route::get('/addbrands', [AdminController::class, 'addbrands'])->name('addbrands');
    Route::post('/addbrandssubmit', [AdminController::class, 'addbrandssubmit'])->name('addbrandssubmit');
    Route::get('/editbrands/{id}', [AdminController::class, 'editbrands'])->name('editbrands');
    Route::post('/editbrandssubmit/{id}', [AdminController::class, 'editbrandssubmit'])->name('editbrandssubmit');
    Route::post('/deletebrands/{id}', [AdminController::class, 'deletebrands'])->name('deletebrands');

    Route::get('/userlist', [AdminController::class, 'userlist'])->name('userlist');
});
