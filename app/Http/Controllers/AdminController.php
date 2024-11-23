<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $categories = Category::all();
        return view('admin.categorylist', compact('categories'));
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
            'slug' => 'required|unique:categories',
        ]);
        // dd($request->all());
        $categorys = new Category();
        $categorys->name = $request->name;
        $categorys->slug = Str::slug($request->slug, '-');
        $categorys->status = $request->status;
        $categorys->save();
        return redirect()->route('category')->with('success', 'Category added succesfully');
    }
    function edit_category($id)
    {
        $categorys = Category::find($id);
        return view('admin.editcategory', compact('categorys'));
    }
    function editcategory(Request $request, $id)
    {
        $request->validate([
            'slug' => 'required|unique:categories,slug,' . $id,
            'name' => 'required',
            'status' => 'required'

        ]);
        $categorys = Category::find($id);
        if (!$categorys) {
            return redirect()->route('category')->with('error', 'Category not found');
        }
        $categorys->name = $request->name;
        $categorys->slug = Str::slug($request->slug, '-');
        $categorys->status = $request->status;
        $categorys->save();
        return redirect()->route('category')->with('success', 'Category updated succesfully');
    }
    function deletecategory($id)
    {
        $categorys = Category::find($id);
        try {
            $categorys->delete();
            return redirect()->route('category')->with('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('category')->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }
}
