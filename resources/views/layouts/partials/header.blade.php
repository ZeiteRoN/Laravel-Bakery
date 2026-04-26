<header class="flex justify-between items-center p-4 w-full bg-red-400 border-b-2 border-gray-300
 rounded-b-2xl shadow-lg ">
    <div>
        <a href="{{route('product.index')}}">
            <img class="w-24 h-24" src="{{asset('images/header-logo.png')}}" alt="header-logo">
        </a>
    </div>
    <div class="nav flex gap-8">
        <a class="{{request()->routeIs('product.index') ? 'text-gray-600' : 'text-white'}}
        flex items-center text-2xl font-semibold tracking-wider
         hover:scale-105 transition-all uppercase"
           href="{{route('product.index')}}">
            Home
        </a>
        <a class="{{request()->routeIs('category.index') ? 'text-gray-600' : 'text-white'}}
        flex items-center text-2xl font-semibold tracking-wider
         hover:scale-105 transition-all uppercase"
           href="{{route('category.index')}}">
            Catalog
        </a>
        <a class="{{request()->routeIs('contact') ? 'text-gray-600' : 'text-white'}}
        flex items-center text-2xl font-semibold tracking-wider
         hover:scale-105 transition-all uppercase"
           href="{{route('contact')}}">
            Contact
        </a>
    </div>
    <div>
        @include('layouts.partials.dropdown')
    </div>
</header>
