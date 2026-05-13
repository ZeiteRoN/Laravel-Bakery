@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>
        
        @if($cart && $cart->items->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        @foreach($cart->items as $item)
                            <div class="flex items-center justify-between border-b pb-4 mb-4 last:border-b-0 last:pb-0 last:mb-0">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset($item->product->getImage()) }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded">
                                    <div>
                                        <h3 class="font-semibold">{{ $item->product->name }}</h3>
                                        <p class="text-gray-600">${{ number_format($item->price, 2) }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center space-x-2">
                                        <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" 
                                                class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center"
                                                {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                            -
                                        </button>
                                        <span class="w-12 text-center">{{ $item->quantity }}</span>
                                        <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" 
                                                class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                                            +
                                        </button>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="font-semibold">${{ number_format($item->quantity * $item->price, 2) }}</p>
                                        <button onclick="removeFromCart({{ $item->id }})" 
                                                class="text-red-500 hover:text-red-700 text-sm">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Cart Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between">
                                <span>Subtotal:</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping:</span>
                                <span>Free</span>
                            </div>
                            <div class="flex justify-between font-semibold text-lg pt-2 border-t">
                                <span>Total:</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                        
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-lime-500 text-white py-3 rounded-lg hover:bg-lime-600 transition">
                                Proceed to Checkout
                            </button>
                        </form>
                        
                        <a href="{{ route('product.index') }}" class="block w-full text-center py-3 mt-2 text-gray-600 hover:text-gray-800">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <div class="mb-6">
                    <svg class="w-24 h-24 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold mb-2">Your cart is empty</h2>
                <p class="text-gray-600 mb-6">Looks like you haven't added any products to your cart yet.</p>
                <a href="{{ route('product.index') }}" class="inline-block bg-lime-500 text-white px-6 py-3 rounded-lg hover:bg-lime-600 transition">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
function updateQuantity(itemId, newQuantity) {
    if (newQuantity < 1) return;
    
    fetch(`/cart/${itemId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            quantity: newQuantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}

function removeFromCart(itemId) {
    if (confirm('Are you sure you want to remove this item from your cart?')) {
        fetch(`/cart/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
</script>
@endpush
