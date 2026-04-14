@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4 max-w-md
 mx-auto border border-gray-300 rounded-lg p-4">
    @csrf
    <div class="border-b border-gray-300 flex justify-center items-center">
        <h1 class="text-2xl font-bold">Register</h1>
    </div>
    <div>
        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
            autofocus
            autocomplete="name"
            class="w-full border border-gray-300 rounded-md p-2"
            placeholder="Name"
        />

        @error('name')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            autocomplete="username"
            class="w-full border border-gray-300 rounded-md p-2"
            placeholder="Email"
        />

        @error('email')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <input
            id="password"
            type="password"
            name="password"
            required
            autocomplete="new-password"
            class="w-full border border-gray-300 rounded-md p-2"
            placeholder="Password"
        />

        @error('password')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            class="w-full border border-gray-300 rounded-md p-2"
            placeholder="Confirm Password"
        />
    </div>

    <div>
        <button type="submit" class="w-full bg-blue-300 text-white py-2 rounded-md hover:bg-blue-400 hover:scale-105 transition">
            Register
        </button>
    </div>
</form>
@endsection
