<div class="flex flex-col justify-center items-center border border-gray-300 shadow-sm rounded-lg
 hover:shadow-lg min-w-40 min-h-60 gap-4 hover:cursor-pointer hover:scale-105 transition">
    <h3>{{$product->name}}</h3>
    <img class="w-20" src="{{asset('images/cake.png')}}" alt="Cake">
    <p>{{$product->price}}</p>
</div>

