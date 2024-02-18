<?php

namespace App\Http\Controllers\Website;

use App\Models\Cart;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends WebsiteController
{
    public function index(Request  $request)
    {
        $products = Product::latest()->simplePaginate(40);
        $oldCart = $request->session()->has("cart") ? $request->session()->get("cart") : null;
        $cart = new Cart($oldCart);
        $user = auth()->user();
        return view("Website.Product.index" , compact(
            "products" ,
            'cart',
            'user'
        ));
    }

    public function mobile(Request  $request)
    {
        $products = Product::latest()->simplePaginate(40);
        $oldCart = $request->session()->has("cart") ? $request->session()->get("cart") : null;
        $cart = new Cart($oldCart);
        $user = auth()->user();
        return view("Website.Product.mobile" , compact(
            "products" ,
            'cart',
            'user'
        ));
    }

    public function toys(Request  $request)
    {
        $products = Product::latest()->simplePaginate(40);
        $oldCart = $request->session()->has("cart") ? $request->session()->get("cart") : null;
        $cart = new Cart($oldCart);
        $user = auth()->user();
        return view("Website.Product.toys" , compact(
            "products" ,
            'cart',
            'user'
        ));
    }

    public function coverglass(Request  $request)
    {
        $products = Product::latest()->simplePaginate(40);
        $oldCart = $request->session()->has("cart") ? $request->session()->get("cart") : null;
        $cart = new Cart($oldCart);
        $user = auth()->user();
        return view("Website.Product.CoverAndGlass" , compact(
            "products" ,
            'cart',
            'user'
        ));
    }

    public function chargercable(Request  $request)
    {
        $products = Product::latest()->simplePaginate(40);
        $oldCart = $request->session()->has("cart") ? $request->session()->get("cart") : null;
        $cart = new Cart($oldCart);
        $user = auth()->user();
        return view("Website.Product.ChargerAndCable" , compact(
            "products" ,
            'cart',
            'user'
        ));
    }

    public function show(Product $product, Request  $request)
    {
        $oldCart = $request->session()->has("cart") ? $request->session()->get("cart") : null;
        $cart = new Cart($oldCart);
        $user = auth()->user();
        return view("Website.Product.show" , compact(
            'product' ,
            'cart',
            'user'
        ));
    }

    public function i(Product $product, Request  $request)
    {
        $oldCart = $request->session()->has("cart") ? $request->session()->get("cart") : null;
        $cart = new Cart($oldCart);
        $user = auth()->user();
        return view("Website.Order.cart" , compact(
            'product' ,
            'cart',
            'user'
        ));
    }

}
