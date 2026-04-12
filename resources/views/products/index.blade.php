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
@endsection
