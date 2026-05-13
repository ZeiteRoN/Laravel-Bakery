<div class="flex flex-col justify-center items-center border border-gray-300 shadow-sm rounded-lg
 hover:shadow-lg w-48 p-4 min-h-60 gap-4 hover:cursor-pointer hover:scale-105 transition">
    <a href="{{route('product.show', $product)}}">
        <div class="flex flex-col justify-center items-center gap-4">
            <h3>{{$product->name}}</h3>
            <img class="w-20" src="{{ asset($product->getImage()) }}" alt="{{$product->name}}">
            <p>{{$product->price}}</p>
        </div>
    </a>
    @auth
        <div class="flex flex-col gap-2 w-full">
            <button onclick="addToCart({{ $product->id }})" 
                    class="w-full bg-lime-500 text-white py-2 px-4 rounded-lg hover:bg-lime-600 transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Add to Cart
            </button>
            
            @if((Auth::user())->is_admin)
                <div class="flex gap-2">
                    <button
                        onclick="editProductModal({{ $product->id }}, '{{ $product->name }}', {{ $product->price }},
                        {{ $product->weight }}, {{ $product->height }}, '{{ $product->stock }}')"
                        class="flex p-2 rounded-lg transition hover:bg-lime-500">
                        <img class="w-6 h-6 grayscale hover:grayscale-0" src="{{asset('images/icons/edit-icon.png')}}"
                             alt="Edit">
                    </button>
                    <button
                        onclick="deleteProductModal({{ $product->id }})"
                        class="flex p-2 rounded-lg transition hover:bg-red-500">
                        <img class="w-6 h-6" src="{{asset('images/icons/trash-can.png')}}" alt="Delete">
                    </button>
                </div>
            @endif
        </div>
    @endauth
</div>
