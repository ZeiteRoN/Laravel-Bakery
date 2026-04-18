@auth
<div class="relative group">
    <button class="bg-gray-400 text-white px-4 py-2.5 border-none cursor-pointer hover:bg-gray-500 transition-colors">
        {{Auth::user()->name}}
    </button>
    <div class="hidden group-hover:block absolute bg-gray-100 min-w-[100px] shadow-lg">
        <a href="{{route('profile.edit')}}" class="block text-black no-underline px-4 py-2.5 hover:bg-gray-500 hover:text-white transition-colors">Profile</a>
        <a href="{{route('logout')}}" class="block text-black no-underline px-4 py-2.5 hover:bg-gray-500 hover:text-white transition-colors">Logout</a>
    </div>
</div>
@endauth
@guest
    <div class="flex gap-2">
        <a href="{{route('register')}}">
            <img class="flex w-12 h-12 hover:scale-105 transition" src="{{asset('images/icons/signup-icon.png')}}" alt="Signup">
        </a>
        <a class="flex w-12 h-12 hover:scale-105 transition" href="{{route('login')}}">
            <img class="w-12 h-12" src="{{asset('images/icons/login-icon.png')}}" alt="Login">
        </a>
    </div>
@endguest
