<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <div>
        <label for="name">Name</label>
        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            required
        />

        @error('name')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-top: 1rem;">
        <label for="email">Email</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            required
        />

        @error('email')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" style="margin-top: 1rem;">
        Save
    </button>

    @if (session('status') === 'profile-updated')
        <p style="color: green;">Saved.</p>
    @endif
</form>
