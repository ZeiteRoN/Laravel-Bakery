<header class="flex justify-between items-center p-4 w-full bg-amber-300">
    <div>
        <a href="{{route('products.index')}}">
            <img class="w-24 h-24" src="{{asset('images/header-logo.png')}}" alt="header-logo">
        </a>
    </div>
    <div>
        <h1>Catalog</h1>
    </div>
    <div>
        @include('layouts.partials.dropdown')
    </div>
</header>
