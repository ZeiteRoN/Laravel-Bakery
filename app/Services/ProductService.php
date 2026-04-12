<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    function __construct(
        private ProductRepository $productRepository
    ){}

    public function getProducts(int $perPage = 12, array $filters):LengthAwarePaginator
    {
        return $this->productRepository->paginate($perPage, $filters);
    }
}
