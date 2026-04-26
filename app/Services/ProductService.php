<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    function __construct(
        private ProductRepository $productRepository
    ){}

    public function getProducts(int $perPage = 12, array $filters): LengthAwarePaginator
    {
        return $this->productRepository->paginate($perPage, $filters);
    }

    public function getProduct(Product $product): ?Product
    {
        return $this->productRepository->getProduct($product->id);
    }

    public function createProduct(array $data): Product
    {
        return $this->productRepository->create($data);
    }

    public function updateProduct(int $id, array $data): Product
    {
        return $this->productRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        $this->productRepository->destroy($id);
    }
}
