<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function fetchdata()
    {
        try {
            // Fetching data from the model
            $products = Product::all();

            // Check if any products were found
            if ($products->isEmpty()) {
                return response()->json(['message' => 'No products found.'], 404);
            }

            // Return a JSON response with the products
            return $products;
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return response()->json(['message' => 'Failed to fetch products', 'error' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        // store the products data and send it to index page
        $products = $this->fetchdata();

        //using the pagination
        $products = Product::paginate(10);
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        // returning a page
        return view('products.create');
    }

    public function createProductApi(Request $request)
    {
        //validating the data from the form
        $data = $request->validate([
            'name' => ['required'],
            'qty' => ['required', 'numeric'],
            'price' => ['required', 'numeric', 'between:0,999999.99'],
            'description' => ['required']
        ]);

        //creating the new product
        try {
            $newProduct = Product::create($data);
            return response()->json(['message' => 'Product created successfully', 'data' => $newProduct], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create product', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        // this is how you check the request -> dd($request);

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
        $data = $request->validate([
            'name' => ['required'],
            'qty' => ['required', 'numeric'],
            'price' => ['required', 'numeric', 'between:0,999999.99'],
            'description' => ['required']
        ]);

        try {
            $updated = $product->update($data);

            if ($updated) {
                return response()->json(['message' => 'Product updated successfully', 'data' => $product], 200);
            } else {
                return response()->json(['message' => 'No changes detected. Product remains the same.'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update product', 'error' => $e->getMessage()], 500);
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
        try {
            $deleted = $product->delete();

            if ($deleted) {
                return response()->json(['message' => 'Product deleted successfully']);
            } else {
                return response()->json(['message' => 'Failed to delete product'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the product', 'error' => $e->getMessage()], 500);
        }
    }

    public function delete(Product $product)
    {
        $this->deleteproductApi($product);

        //after updating redecting to the home page
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
