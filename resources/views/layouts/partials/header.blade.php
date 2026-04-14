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
    <div>
        <button>{{Auth::user()->name}}</button>
        <div>
            <a href="{{route('profile.edit')}}">Profile</a>
            <form action="{{route('logout')}}" type="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
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
