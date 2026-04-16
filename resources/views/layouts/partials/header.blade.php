<header class="flex justify-between items-center p-4 w-full bg-amber-300">
    <div>
        <a href="{{route('products.index')}}">
            <img class="w-24 h-24" src="{{asset('images/header-logo.png')}}" alt="header-logo">
        </a>
    </div>
    <div>
        <h1>Catalog</h1>
    </div>
    @auth
    <div class="dropdown">
        <button>{{Auth::user()->name}}</button>
        <div class="content">
            <a href="{{route('profile.edit')}}">Profile</a>
            <a href="{{route('logout')}}">Logout</a>
        </div>
    </div>
    @endauth
    @guest
        <div>
            <a href="{{route('login')}}">Login</a>
            <a href="{{route('register')}}">Register</a>
        </div>
    @endguest
</header>
