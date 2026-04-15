<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('DELETE')

    <p>This action is permanent.</p>

    <div>
        <label for="password">Password</label>
        <input
            id="password"
            type="password"
            name="password"
            required
        />
        @error('password')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">
        Delete Account
    </button>
</form>
