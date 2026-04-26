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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'image_path' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('products', 'public');
        }
        $data['is_active'] = $request->has('is_active');
        $this->productService->createProduct($data);
        return redirect()->route('product.index');
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
            'category_id' => 'sometimes|exists:categories,id',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('products', 'public');
        }

        $this->productService->updateProduct($product->id, $data);

        return back()->with('success', 'Product updated');
    }

    public function destroy(int $id)
    {
        if (!auth()->user()?->is_admin) {
            abort(403);
        }
        $this->productService->destroy($id);
        return redirect()->route('product.index');
    }
}
