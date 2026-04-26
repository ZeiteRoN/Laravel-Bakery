@extends('layouts.app')

@section('content')
    <div class="flex gap-4">
        @include('components.filters', ['filters' => $filters])
        <div>
            <h1>Products</h1>
            <div class="flex flex-wrap gap-4">
                @foreach($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
    <div id="editModal"
         class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-5 border border-gray-400 rounded-xl shadow-lg max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-xl">Edit Product</h2>
                <button onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;</button>
            </div>
            @include('components.admin.edit-product-form')
        </div>
    </div>
    <div id="deleteModal"
         class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-5 border border-gray-400 rounded-xl shadow-lg max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-xl">Delete Product</h2>
                <button onclick="closeModal('deleteModal')" class="text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;</button>
            </div>
            @include('components.admin.delete-product-window')
        </div>
    </div>
@endsection
