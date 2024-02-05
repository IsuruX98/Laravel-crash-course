<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate(
            [
                'name' => ['required'],
                'qty' => ['required', 'numeric'],
                'price' => ['required', 'numeric'],
                'description' => ['required']
            ]
        );

        $newProduct = Product::create($data);

        print_r($newProduct);

        // dd($newProduct);

        return redirect(route('product.index'));
    }
}
