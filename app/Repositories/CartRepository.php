<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    public function getOrCreateCart($userId)
    {
        return Cart::firstOrCreate(['user_id' => $userId]);
    }

    public function getCartWithItems($userId)
    {
        return Cart::with('items.product')->where('user_id', $userId)->first();
    }

    public function clearCart($userId)
    {
        $cart = $this->getOrCreateCart($userId);
        $cart->items()->delete();
        return $cart;
    }
}
