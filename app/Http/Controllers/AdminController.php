<?php

namespace App\Http\Controllers;

use App\Models\Brands;
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
    function brands()
    {
        $brands = Brands::with('creator')->get();
        return view('admin.brands.brands', compact('brands'));
    }
    function addbrands()
    {

        return view('admin.brands.addbrands');
    }
    function addbrandssubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands',
            'status' => 'required'

        ]);
        $brands = new Brands();
        $brands->name = $request->name;
        $brands->slug = Str::slug($request->slug, '-');
        $brands->created_by = Auth::id();
        $brands->status = $request->status;
        $brands->save();
        return redirect()->route('brands')->with('success', 'Categories added succesfully');
    }
    function editbrands($id)
    {
        $brands = Brands::find($id);
        return view('admin.brands.editbrands', compact('brands'));
    }
    function editbrandssubmit($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $id,
            'status' => 'required'
        ]);
        $brands = Brands::find($id);
        if (!$brands) {
            return redirect()->route('brands')->with('error', 'Brand not found');
        }
        $brands->name = $request->name;
        $brands->slug = Str::slug($request->slug, '-');
        $brands->status = $request->status;
        $brands->save();
        return redirect()->route('brands')->with('Brands updated succesfully');
    }
    function deletebrands($id)
    {
        $brands = Brands::find($id);
        try {
            $brands->delete();
            return redirect()->route('brands')->with('success', 'Brands deleted succesfully');
        } catch (\Exception $e) {
            return redirect()->route('brands')->with('error', 'Error deleting brands: ' . $e->getMessage());
        }
    }
    function products()
    {
        return view('admin.product.product');
    }
}
