<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        $products = Product::all();
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        $categories = Category::all();
        $brands = Brand::all();
        $units = Unit::all();
        return view('pages.products.create', compact('categories', 'brands', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : RedirectResponse
    {
        // dd($request->all());
        Product::create([
            'product_name' => $request['product_name'],
            'product_description' => $request['product_description'],
            'product_cost' => $request['product_cost'],
            'product_price' => $request['product_price'],
            'unit_id' => $request['product_unit'],
            'category_id' => $request['product_category'],
            'brand_id' => $request['product_brand'],
        ]);

        return redirect()->route('products.index')->with('success', 'Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function show(Product $product)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function edit($id) : View
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $units = Unit::all();
        return view('pages.products.edit', compact('product', 'categories', 'brands', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        $product = Product::find($id);

        $product->product_name = $request['product_name'];
        $product->product_description = $request['product_description'];
        $product->product_cost = $request['product_cost'];
        $product->product_price = $request['product_price'];
        $product->unit_id = $request['product_unit'];
        $product->category_id = $request['product_category'];
        $product->brand_id = $request['product_brand'];

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : RedirectResponse
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product Removed Successfully!');
    }

    public function getPrice($id)
    {
        try {
            $product = Product::findOrFail($id);
            // return the product price based on id sent through the request
            return response()->json(['product_price' => $product->product_price]);
        } catch (\Exception $e) {
            // Handle exceptions if the product is not found or other errors
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
    public function getCost($id)
    {
        try {
            $product = Product::findOrFail($id);
            // return the product cost based on id sent through the request
            return response()->json(['product_cost' => $product->product_cost]);
        } catch (\Exception $e) {
            // Handle exceptions if the product is not found or other errors
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

}
