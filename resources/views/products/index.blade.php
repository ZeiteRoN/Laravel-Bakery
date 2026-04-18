@extends('layouts.app')

@section('content')
    <div class="flex gap-4">
        @include('components.filters')
        <div>
            <h1>Products</h1>
            <div class="flex flex-wrap gap-4">
                @foreach($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
    <div id="editModal" class="hidden fixed top-[20%] left-[40%] bg-white p-5 border border-gray-400 rounded-xl shadow-lg">
        <h2 class="text-center mb-2 font-bold text-2xl border-b-2 border-black">Edit Product</h2>
        @include('components.admin.edit-product-form')
    </div>
    <div id="deleteModal" class="hidden fixed top-[20%] left-[40%] bg-white p-5 border border-gray-400 rounded-xl shadow-lg">
        @include('components.admin.delete-product-window')
    </div>
@endsection
