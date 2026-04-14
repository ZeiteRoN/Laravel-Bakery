@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}"
          class="max-w-md flex flex-col gap-4 mx-auto border border-gray-300 rounded-lg p-4">
        @csrf
        <div class="border-b border-gray-300 flex justify-center items-center">
            <h1 class="text-2xl font-bold">Login</h1>
        </div>
        <div>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                class="w-full border border-gray-300 rounded-md p-2"
                placeholder="Email"
            />

            @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 1rem;">
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="w-full border border-gray-300 rounded-md p-2"
                placeholder="Password"
            />

            @error('password')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>
                <input type="checkbox" name="remember" class="rounded hover:scale-105 transition">
                Remember me
            </label>
        </div>

        <div class="flex flex-col gap-4">

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="transition hover:text-red-400">
                    Forgot your password?
                </a>
            @endif

            <button type="submit"
                    class="w-full bg-blue-300 text-white py-2 rounded-md hover:bg-blue-400 hover:scale-105 transition">
                Log in
            </button>
        </div>
    </form>
@endsection
