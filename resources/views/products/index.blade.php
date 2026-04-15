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
    <div id="editModal" style="display:none; position:fixed; top:20%; left:40%; background:white; padding:20px;">
        @include('components.admin.edit-product-form')
    </div>
    <div id="deleteModal" style="display:none; position:fixed; top:20%; left:40%; background:white; padding:20px;">
        @include('components.admin.delete-product-window')
    </div>
@endsection
