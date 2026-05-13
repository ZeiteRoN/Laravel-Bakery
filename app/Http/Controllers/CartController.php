<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use App\Repositories\CartItemRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartRepository;
    protected $cartItemRepository;

    public function __construct(CartRepository $cartRepository, CartItemRepository $cartItemRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
    }
    public function index()
    {
        $cart = $this->cartRepository->getCartWithItems(auth()->id());
        $total = $cart ? $cart->items->sum(function($item) {
            return $item->quantity * $item->price;
        }) : 0;

        return view('content.cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id', 'quantity' => 'integer|min:1']);

        $cart = $this->cartRepository->getOrCreateCart(auth()->id());
        $cartItem = $this->cartItemRepository->addToCart($cart->id, $request->product_id, $request->quantity);

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    public function update(Request $request, $cartItemId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $this->cartItemRepository->updateQuantity($cartItemId, $request->quantity);

        return response()->json(['success' => true]);
    }

    public function remove($cartItemId)
    {
        $this->cartItemRepository->removeFromCart($cartItemId);

        return response()->json(['success' => true]);
    }

    public function getCounter()
    {
        $cart = $this->cartRepository->getCartWithItems(auth()->id());
        $count = $cart ? $cart->items->sum('quantity') : 0;
        
        return response()->json(['count' => $count]);
    }
}
