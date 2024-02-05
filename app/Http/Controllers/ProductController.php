<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function fetchdata()
    {
        // passing the data from model to frontend
        $products = Product::all();
        return $products;
    }

    public function index()
    {
        $products = $this->fetchdata();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function createProductApi(Request $request)
    {
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

        return $newProduct;
    }

    public function store(Request $request)
    {
        // dd($request);

        $this->createProductApi($request);

        //after creating redecting to the home page
        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        // dd($product);

        return view('products.edit', ['product' => $product]);
    }

    public function updateProductApi(Product $product, Request $request)
    {
        //validating the data from the form
        $data = $request->validate(
            [
                'name' => ['required'],
                'qty' => ['required', 'numeric'],
                'price' => ['required', 'decimal:0,2'],
                'description' => ['required']
            ]
        );

        if ($product) {
            $updatedProduct = $product->update($data);
            $message = "hello vade hari";
            return $message;
        } else {
            $message = "hello vade awl gihin";
            return $message;
        }
    }

    public function update(Product $product, Request $request)
    {
        $this->updateProductApi($product, $request);

        //after updating redecting to the home page
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    public function deleteproductApi(Product $product)
    {
        $deleted = $product->delete();

        return $deleted;
    }

    public function delete(Product $product)
    {
        $this->deleteproductApi($product);

        //after updating redecting to the home page
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
