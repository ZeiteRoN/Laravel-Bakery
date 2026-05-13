<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function createOrderFromCart($userId)
    {
        $cart = Cart::with('items.product')->where('user_id', $userId)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return null;
        }

        return DB::transaction(function () use ($cart, $userId) {
            $totalPrice = $cart->items->sum(function ($item) {
                return $item->quantity * $item->price;
            });

            $order = Order::create([
                'user_id' => $userId,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            foreach ($cart->items as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                ]);
            }

            $cart->items()->delete();

            return $order->load('items.product');
        });
    }

    public function getUserOrders($userId)
    {
        return Order::with('items.product')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getOrderById($orderId, $userId = null)
    {
        $query = Order::with('items.product');

        if ($userId) {
            $query->where('user_id', $userId);
        }

        return $query->findOrFail($orderId);
    }

    public function updateOrderStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);
        $order->update(['status' => $status]);
        return $order;
    }

    public function getAllOrders()
    {
        return Order::with('items.product', 'user')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
