@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">My Orders</h1>
        
        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold">Order #{{ $order->id }}</h3>
                                <p class="text-gray-600 text-sm">{{ $order->created_at->format('F j, Y, g:i a') }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xl font-bold text-lime-600">${{ number_format($order->total_price, 2) }}</p>
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status === 'completed') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="border-t pt-4">
                            <p class="text-gray-600 mb-2">{{ $order->items->count() }} item(s)</p>
                            <a href="{{ route('orders.show', $order->id) }}" 
                               class="text-lime-600 hover:text-lime-700 font-semibold">
                                View Details →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <div class="mb-6">
                    <svg class="w-24 h-24 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold mb-2">No orders yet</h2>
                <p class="text-gray-600 mb-6">You haven't placed any orders yet.</p>
                <a href="{{ route('product.index') }}" class="inline-block bg-lime-500 text-white px-6 py-3 rounded-lg hover:bg-lime-600 transition">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
@endsection
