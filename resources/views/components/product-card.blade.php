<a href="{{route('products.show', $product)}}">
    <div class="flex flex-col justify-center items-center border border-gray-300 shadow-sm rounded-lg
 hover:shadow-lg min-w-40 min-h-60 gap-4 hover:cursor-pointer hover:scale-105 transition">
        <h3>{{$product->name}}</h3>
        <img class="w-20" src="{{ $product->getImage() }}" alt="{{$product->name}}">
        <p>{{$product->price}}</p>
        @auth
        @if((Auth::user())->is_admin)
        <div class="flex gap-4">
                <a href="">
                    <img class="w-8 h-8 " src="{{asset('images/icons/edit-icon.png')}}" alt="Delete">
                </a>
                <a href="">
                    <img class="w-8 h-8" src="{{asset('images/icons/trash-can.png')}}" alt="Delete">
                </a>
        </div>
        @endif
        @endauth

    </div>

</a>
