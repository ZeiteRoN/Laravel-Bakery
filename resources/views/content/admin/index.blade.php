@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Admin Panel</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <a href="{{ route('admin.orders.index') }}" 
               class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <h2 class="text-xl font-semibold mb-2">Orders</h2>
                <p class="text-gray-600">Manage customer orders</p>
            </a>
        </div>
        
        <div>
            @include('content.admin.partials.add-product-form')
        </div>
    </div>
@endsection
