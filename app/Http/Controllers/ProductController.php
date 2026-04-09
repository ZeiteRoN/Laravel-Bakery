<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function show()
    {

    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Product::create($request->validated());
        return redirect()->route('products.index');
    }

    public function edit()
    {

    }

    public function update(Product $product)
    {

    }

    public function destroy()
    {

    }
}
