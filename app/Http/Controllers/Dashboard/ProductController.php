<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->simplePaginate(2);
        $user = auth()->user();
        return view("Dashboard.Product.index" , compact(
            'products',
            'user'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Dashboard.Product.create")  ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255',
            'body' => 'nullable',
            'price' => 'required|numeric',
            "image" => 'required|mimes:jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $imageName = time() . "_" . rand(1000 , 9999) . "." . $request->image->extension();

        $imageFilePatch = $request->image->storeAs("images" , $imageName , 'public');


        Product::create([
            "title" => $request->title ,
            "body" => $request->body ,
            "price" => $request->price ,
            "image" => $imageFilePatch ,
        ]);

        return redirect(route("dashboard.product.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("Dashboard.Product.edit" , compact(
            'product'
        ))  ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255',
            'body' => 'nullable',
            'price' => 'required|numeric',
            "image" => 'nullable|mimes:jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->image)
        {
            $imageName = time() . "_" . rand(1000 , 9999) . "." . $request->image->extension();
            $imageFilePatch = $request->image->storeAs("images" , $imageName , 'public');
        }
        else
        {
            $imageFilePatch = $product->image;
        }



        $product->update([
            "title" => $request->title ,
            "body" => $request->body ,
            "price" => $request->price ,
            "image" => $imageFilePatch ,
        ]);

        return redirect(route("dashboard.product.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route("dashboard.product.index"));
    }
}
