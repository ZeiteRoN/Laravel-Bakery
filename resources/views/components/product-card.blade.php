<div class="flex flex-col justify-center items-center border border-gray-300 shadow-sm rounded-lg
 hover:shadow-lg min-w-40 min-h-60 gap-4 hover:cursor-pointer hover:scale-105 transition">
    <a href="{{route('product.show', $product)}}">
        <div class="flex flex-col justify-center items-center gap-4">
            <h3>{{$product->name}}</h3>
            <img class="w-20" src="{{ $product->getImage() }}" alt="{{$product->name}}">
            <p>{{$product->price}}</p>
        </div>
    </a>
    @auth
        @if((Auth::user())->is_admin)
            <div class="flex gap-4">
                <button
                    onclick="editProductModal({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})"
                    class="flex p-2 rounded-lg transition hover:bg-lime-500">
                    <img class="w-8 h-8 grayscale hover:grayscale-0" src="{{asset('images/icons/edit-icon.png')}}"
                         alt="Edit">
                </button>
                <button
                    onclick="deleteProductModal({{ $product->id }})"
                    class="flex p-2 rounded-lg transition hover:bg-red-500">
                    <img class="w-8 h-8" src="{{asset('images/icons/trash-can.png')}}" alt="Delete">
                </button>
            </div>
        @endif
    @endauth
</div>
