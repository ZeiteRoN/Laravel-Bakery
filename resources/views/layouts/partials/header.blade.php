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
        @auth
            <a href="{{ route('cart.index') }}" 
               class="{{request()->routeIs('cart.*') ? 'text-gray-600' : 'text-white'}}
               flex items-center text-2xl font-semibold tracking-wider
                hover:scale-105 transition-all uppercase relative">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Cart
                <span id="cart-counter" class="hidden absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                    0
                </span>
            </a>
            <a href="{{ route('orders.index') }}" 
               class="{{request()->routeIs('orders.*') ? 'text-gray-600' : 'text-white'}}
               flex items-center text-2xl font-semibold tracking-wider
                hover:scale-105 transition-all uppercase">
                Orders
            </a>
        @endauth
    </div>
    <div>
        @include('layouts.partials.dropdown')
    </div>
</header>
