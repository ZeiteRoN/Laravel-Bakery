@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($categories as $category)
            <div class="bg-white shadow rounded-xl p-4 text-center hover:shadow-lg transition">
                <a href="{{route('category.show', [$category])}}" class="text-md font-semibold">{{ $category->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
