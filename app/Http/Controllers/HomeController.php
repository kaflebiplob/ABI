<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Enquiry;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    function userlogout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    function index()
    {
        $tyres = Products::where('category_id', 2)->take(3)->get();
        $battries = Products::where('category_id', 3)->take(3)->get();
        $lubricants = Products::where('category_id', 7)->take(3)->get();
        $cartCount = Cart::where('user_id', Auth::id())->count();
        return view('home.index', compact('tyres', 'battries', 'lubricants', 'cartCount'));
    }
    function products(Request $request)
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();

        $searchQuery = $request->input('product-search');

        if ($searchQuery) {
            $searchedProducts = Products::where('name', 'LIKE', "%$searchQuery%")
                ->orWhere('short_description', 'LIKE', "%$searchQuery%")
                ->get();
        } else {
            $searchedProducts = collect();
        }
        $tyres = Products::where('category_id', 2)->get();
        $battries = Products::where('category_id', 3)->get();
        $lubricants = Products::where('category_id', 7)->take(3)->get();


        return view('home.products', compact('tyres', 'battries', 'lubricants', 'searchedProducts', 'searchQuery', 'cartCount'));
    }
    function productdetail($id)
    {
        $products = Products::find($id);
        $cartCount = Cart::where('user_id', Auth::id())->count();

        return view('home.product_detail', compact('products', 'cartCount'));
    }

    function contactus()
    {

        return view('home.contact.contact');
    }
    function cart()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        $cartCount = $cartItems->sum('quantity');
        
        return view('home.carts.cart', compact('cartItems', 'cartCount'));
    }
    function addtocart(Request $request, $id)
    {
        $products = Products::find($id);
        if (!$products) {
            return redirect()->route('index')->with('error', 'Product not found');
        }
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Login first');
        }
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
                'category_id' => $products->category_id,

            ]);
        }
        return redirect()->route('cart')->with('success', 'Product added to cart successfully.');
    }
    function removefromcart($id)
    {
        $cartItem = Cart::find($id);
        $cartItem->delete();
        return redirect()->route('cart');
    }
    function myorders(){
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    
        return view('home.order.myorders', compact('cartCount', 'orders'));
    }
    function orders($token)
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $order = Order::where('order_token', $token)->firstOrFail();
        if (Auth::id() !== $order->user_id && Auth::user()?->usertype !== 'admin') {
            abort(403, 'Unauthorized action');
        }

        return view('home.order.order', compact('cartCount', 'order'));
    }
    function createorder(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0'
        ]);
        $order =  Order::create([
            'amount' => $request->amount,
            'user_id' => Auth::id(),

        ]);
        return redirect()->route('orders', $order->order_token)->with('success', 'Order Placed Succesfully');
    }
}
