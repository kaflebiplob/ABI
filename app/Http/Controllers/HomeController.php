<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function userlogout(){
        Auth::logout();
        return redirect()->route('index');
    }
   
    function index()
    {
        $tyres= Products::where('category_id',2)->take(3)->get();
        $battries = Products::where('category_id',3)->take(3)->get();
        $lubricants = Products::where('category_id',7)->take(3)->get();
        return view('home.index', compact('tyres','battries','lubricants'));
    }
    function products()
    {
        $tyres= Products::where('category_id',2)->get();
        $battries= Products::where('category_id',3)->get();
        $lubricants = Products::where('category_id',7)->take(3)->get();

        return view('home.products',compact('tyres','battries','lubricants'));
    }
    function productdetail($id)
    {
        $products = Products::find($id);
        return view('home.product_detail', compact('products'));
    }
}
