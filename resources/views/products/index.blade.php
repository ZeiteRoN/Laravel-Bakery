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
    <div id="editModal" class="modal">
        <h2>Edit Product</h2>
        @include('components.admin.edit-product-form')
    </div>
    <div id="deleteModal" class="modal">
        @include('components.admin.delete-product-window')
    </div>
@endsection
