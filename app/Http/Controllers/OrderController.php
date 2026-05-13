<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getUserOrders(auth()->id());
        return view('content.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = $this->orderRepository->getOrderById($orderId, auth()->id());
        return view('content.orders.show', compact('order'));
    }

    public function checkout()
    {
        $order = $this->orderRepository->createOrderFromCart(auth()->id());

        if (!$order) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty. Please add items before checkout.');
        }

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order placed successfully!');
    }

    public function updateStatus(Request $request, $orderId)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,delivered'
        ]);

        $order = $this->orderRepository->updateOrderStatus($orderId, $request->status);

        return response()->json(['success' => true, 'order' => $order]);
    }

    public function adminIndex()
    {
        $orders = $this->orderRepository->getAllOrders();
        return view('content.admin.orders.index', compact('orders'));
    }
}
