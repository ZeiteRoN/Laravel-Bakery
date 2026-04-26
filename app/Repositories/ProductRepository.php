<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function paginate(int $perPage = 12, array $filters):LengthAwarePaginator
    {
        return Product::query()
            ->when($filters['search'] ?? null, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search. '%');})
            ->when($filters['min_price'] ?? null, function ($query, $minPrice) {
                return $query->where('price', '>=', $minPrice);})
            ->when($filters['max_price'] ?? null, function ($query, $maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->when($filters['category'] ?? null, function ($query, $categories) {
                return $query->where('category_id', '=', $categories);
            })
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getProduct(int $id): Product
    {
        return Product::where('id', $id)->first();
    }

    public function create(array $data): Product
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'price' => $data['price'],
            'weight' => $data['weight'],
            'height' => $data['height'],
            'category_id' => $data['category_id'],
            'image_path' => $data['image_path'] ?? null,
            'stock' => $data['stock'],
            'is_active' => $data['is_active'] ?? true
        ]);
    }

    public function update(int $id, array $data): Product
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? $product->description,
            'price' => $data['price'],
            'weight' => $data['weight'],
            'height' => $data['height'],
            'category_id' => $data['category_id'] ?? $product->category_id,
            'image_path' => $data['image_path'] ?? $product->image_path,
            'stock' => $data['stock'],
            'is_active' => $data['is_active'] ?? $product->is_active
        ]);
        return $product;
    }

    public function destroy(int $id)
    {
        Product::destroy($id);
    }
}
