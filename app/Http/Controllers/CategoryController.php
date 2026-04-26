<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct(
        private ProductService $productService,
        private CategoryService $categoryService
    ){}

    public function index()
    {
        return view('content.categories.index', [
            'categories' => $this->categoryService->getCategories()
        ]);
    }

    public function show(Category $category)
    {
        $filters = ['category' => $category->id];

        return view('content.products.index', [
            'products' => $this->productService->getProducts(12, $filters),
            'categories' => $this->categoryService->getCategories(),
            'filters' => $filters
        ]);
    }
}
