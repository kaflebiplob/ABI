<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $tyres= Products::where('category_id',2)->take(3)->get();
        $battries = Products::where('category_id',3)->take(3)->get();
        return view('home.index', compact('tyres','battries'));
    }
    function products()
    {
        $tyres= Products::where('category_id',2)->get();
        $battries= Products::where('category_id',3)->get();
        return view('home.products',compact('tyres','battries'));
    }
    function productdetail($id)
    {
        $products = Products::find($id);
        return view('home.product_detail', compact('products'));
    }
}
