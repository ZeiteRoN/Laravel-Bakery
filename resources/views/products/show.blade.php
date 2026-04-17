@extends('layouts.app')

@section('content')
    <div class="flex gap-8">
        <div class="flex flex-col gap-4">
            <div id="img-cart" class="flex gap-12">
                <div id="img" class="flex flex-col gap-2">
                    <img class="border-2 p-8 rounded-xl" src="{{asset($product->getImage())}}" alt="ProductImage">
                    <h1 class="text-4xl bold">{{$product->name}}</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-col mx-auto gap-8 p-8">
            <div class="">
                <h1 class="font-bold text-2xl">Опис:</h1>
                {{$product->description}}
            </div>
            <div id="cart" class="flex w-full justify-center">
                <form action="" method="POST">
                    <button type="submit" class="text-4xl font-bold bg-green-300 rounded-xl p-4 hover:bg-green-400 hover:scale-105 transition-all">Add to cart</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
