<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    function __construct(
        private CategoryRepository $categoryRepository
    ){}

    public function getCategories()
    {
        return $this->categoryRepository->getCategories();
    }

    public function destroy(int $id)
    {
        $this->categoryRepository->destroy($id);
    }

    public function create(string $name)
    {
        return $this->categoryRepository->create($name);
    }
}
