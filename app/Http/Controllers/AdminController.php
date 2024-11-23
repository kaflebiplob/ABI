<?php

namespace App\Http\Controllers;

// use App\Models\Category;
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
        return view('admin.categorylist');
    }
    function addcategory()
    {
        return view('admin.addcategory');
    }
    function addcategorysubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'slug' => 'required|unique:category',
        ]);
        // dd($request->all());
        // $categorys = new Category();
        // $categorys->name = $request->name;
        // $categorys->slug = $request->slug;
        // $categorys->status = $request->status;
        // $categorys->save();
        // return redirect()->route('addcategory')->with('success', 'category added succesfully');
    }
}
