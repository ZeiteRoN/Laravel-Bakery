<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct(
        private ProductService $productService
    ){}

    public function index(Request $request)
    {
        $filters = $request->only(['search', 'category', 'min_price', 'max_price']);

        return view('products.index',[
            'products' => $this->productService->getProducts(12, $filters),
            'categories' => Category::all(),
            'filters' => $filters
        ]);
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
