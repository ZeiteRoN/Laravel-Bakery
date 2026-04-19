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

        return view('content.products.index',[
            'products' => $this->productService->getProducts(12, $filters),
            'categories' => Category::all(),
            'filters' => $filters
        ]);
    }

    public function show(Product $product)
    {
        $reviews = $product->reviews()->with('user')->get();

        return view('content.products.show', [
            'product' => $this->productService->getProduct($product),
            'reviews' => $reviews
        ]);
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

    public function update(Request $request, Product $product)
    {
        if (!auth()->user()?->is_admin) {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
        ]);

        $product->update($data);

        return back()->with('success', 'Product updated');
    }

    public function destroy(int $id)
    {
        if (!auth()->user()?->is_admin) {
            abort(403);
        }
        $this->productService->destroy($id);
        return redirect()->route('products.index');
    }
}
