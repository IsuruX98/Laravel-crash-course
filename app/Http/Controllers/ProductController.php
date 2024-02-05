<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // passing the data from model to frontend
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        // dd($request);

        //validating the data from the form
        $data = $request->validate(
            [
                'name' => ['required'],
                'qty' => ['required', 'numeric'],
                'price' => ['required', 'decimal:0,2'],
                'description' => ['required']
            ]
        );

        //creating the new product
        $newProduct = Product::create($data);

        //after creating redecting to the home page
        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        // dd($product);

        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request)
    {
        // dd($product);

        //validating the data from the form
        $data = $request->validate(
            [
                'name' => ['required'],
                'qty' => ['required', 'numeric'],
                'price' => ['required', 'decimal:0,2'],
                'description' => ['required']
            ]
        );

        $product->update($data);

        //after updating redecting to the home page
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }
}
