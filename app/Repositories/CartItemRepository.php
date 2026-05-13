<?php

namespace App\Repositories;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartItemRepository
{
    public function addToCart($cartId, $productId, $quantity = 1)
    {
        $product = Product::findOrFail($productId);

        $cartItem = CartItem::where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $quantity);
            $cartItem->update(['price' => $product->price]);
        } else {
            $cartItem = CartItem::create([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price
            ]);
        }

        return $cartItem;
    }

    public function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = CartItem::findOrFail($cartItemId);

        if ($quantity <= 0) {
            return $cartItem->delete();
        }

        $cartItem->update(['quantity' => $quantity]);
        return $cartItem;
    }

    public function removeFromCart($cartItemId)
    {
        return CartItem::findOrFail($cartItemId)->delete();
    }
}
