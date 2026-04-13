<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductService
{
    function __construct(
        private ProductRepository $productRepository
    )
    {
    }

    public function getProducts(int $perPage = 12, array $filters): LengthAwarePaginator
    {
        return $this->productRepository->paginate($perPage, $filters);
    }

    public function getProduct(Product $product): ?Product
    {
        return $this->productRepository->getProduct($product->id);
    }
}
