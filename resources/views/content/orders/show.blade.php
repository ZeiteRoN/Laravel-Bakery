@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('orders.index') }}" class="text-lime-600 hover:text-lime-700">
                ← Back to Orders
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h1 class="text-3xl font-bold">Order #{{ $order->id }}</h1>
                    <p class="text-gray-600">{{ $order->created_at->format('F j, Y, g:i a') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-lime-600">${{ number_format($order->total_price, 2) }}</p>
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold 
                        @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status === 'completed') bg-blue-100 text-blue-800
                        @elseif($order->status === 'delivered') bg-green-100 text-green-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Order Items</h2>
            
            @foreach($order->items as $item)
                <div class="flex items-center justify-between border-b pb-4 mb-4 last:border-b-0 last:pb-0 last:mb-0">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset($item->product->getImage()) }}" 
                             alt="{{ $item->product->name }}" 
                             class="w-20 h-20 object-cover rounded">
                        <div>
                            <h3 class="font-semibold">{{ $item->product->name }}</h3>
                            <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <p class="font-semibold">${{ number_format($item->price, 2) }} each</p>
                        <p class="text-gray-600">${{ number_format($item->quantity * $item->price, 2) }}</p>
                    </div>
                </div>
            @endforeach
            
            <div class="border-t pt-4 mt-4">
                <div class="flex justify-between text-lg font-semibold">
                    <span>Total:</span>
                    <span>${{ number_format($order->total_price, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
