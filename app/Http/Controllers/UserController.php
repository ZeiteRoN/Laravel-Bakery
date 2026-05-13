<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;

class UserController extends Controller
{

    function __construct(
        private CategoryService $categoryService
    ){}
    public function admin()
    {
        $categories = $this->categoryService->getCategories();
        return view('content.admin.index', compact('categories'));
    }
}
