<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
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
        // $products = Products::paginate(1);
        $products = Products::orderBy('created_at', 'desc')->paginate(50);

        return view('admin.product.product', compact('products'));
    }
    function addproduct()
    {
        $brands = Brands::all();
        $categories = Category::all();
        return view('admin.product.addproduct', compact('brands', 'categories'));
    }
    function addproductsubmit(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'sku' => 'required',
            'old_price' => 'required',
            'price' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'additional_information' => 'required',
            'shipping_returns' => 'required',
            'status' => 'required',


        ]);
        $products = new Products();
        $products->name = $request->name;
        $products->slug = Str::slug($request->slug);
        $products->SKU = $request->sku;
        $products->old_price = $request->old_price;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;

        $products->price = $request->price;
        $products->short_description = $request->short_description;
        $products->description = $request->description;
        $products->additional_information = $request->additional_information;
        $products->shipping_returns = $request->shipping_returns;
        $products->status = $request->status;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);

            $products->image = $imagename;
        }
        $products->save();
        return redirect()->route('product_list')->with('success', 'Product added succesfully');
    }
    function editproduct($id)
    {
        $products = Products::find($id);
        $brands = Brands::all();
        $categories = Category::all();
        return view('admin.product.editproduct', compact('products', 'brands', 'categories'));
    }
    function editproductsubmit($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',


        ]);

        $products = Products::find($id);
        if (!$products) {
            return redirect()->route('product_list')->with('error', 'Product not found');
        }
        $products->name = $request->name;
        $products->sku = $request->sku;
        $products->price = $request->price;
        $products->short_description = $request->short_description;
        $products->description = $request->description;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->slug = $request->slug;
        $products->old_price = $request->old_price;
        $products->status = $request->status;
        $image = $request->image;
        // if ($image) {
        //     $imagename = time() . '.' . $image->getClientOriginalExtension();
        //     $request->image->move('products', $imagename);

        //     $products->image = $imagename;
        // }
        if ($request->hasFile('image')) {
            if ($products->image && file_exists(public_path('products/' . $products->image))) {
                unlink(public_path('products/' . $products->image));
            }
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $products->image = $imagename;
        }
        $products->save();
        return redirect()->route('product_list')->with('success', 'Product updated succesfully');
    }

    function deleteproduct($id)
    {
        $products = Products::find($id);
        if (!$products) {
            return redirect()->route('product_list')->with('error', 'Product not found.');
        }
        try {
            if ($products->image) {
                $imagename = public_path('products/' . $products->image);
                if (file_exists($imagename)) {
                    unlink($imagename);
                }
            }
            $products->delete();
            return redirect()->route('product_list')->with('success', 'Product deleted succesfully');
        } catch (\Exception $e) {

            return redirect()->route('product_list')->with('error', 'Error deleting products: ' . $e->getMessage());
        }
    }
    function userlist()
    {
        $users = User::all()->count();
        $products = Products::all()->count();
        $brands = Brands::all()->count();
        $category = Category::all()->count();
        $orders = Order::all()->count();
        $delivered = Order::where('status','delivered')->count();
        return view('admin.users.userlist', compact('users', 'products', 'brands', 'category','orders','delivered'));
    }
    function orders()
    {
        $orders = Order::all();
        return view('admin.order.order', compact('orders'));
    }
    function deleteorder($id)
    {
        $orders = Order::find($id);
        try {
            $orders->delete();
            return redirect()->route('orders')->with('success', 'Order deleted succesfully');
        } catch (\Exception $e) {
            return redirect()->route('orders')->with('error', 'Error deleting order: ' . $e->getMessage());
        }
    }
    function delivered($id){
        $orders = Order::find($id);
        $orders->status = 'Delivered';
        $orders->save();
        return redirect()->route('orders')->with('success','Product Delivered succesfully');

    }
    function ontheway($id){
        $orders = Order::find($id);
        $orders->status = 'on the way';
        $orders->save();
        return redirect()->route('orders')->with('success','Product on the way');

    }
}
