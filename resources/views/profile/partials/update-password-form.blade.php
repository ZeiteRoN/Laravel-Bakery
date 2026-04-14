<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <div>
        <label for="current_password">Current Password</label>
        <input
            id="current_password"
            type="password"
            name="current_password"
            required
        />
        @error('current_password')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-top: 1rem;">
        <label for="password">New Password</label>
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

    <div style="margin-top: 1rem;">
        <label for="password_confirmation">Confirm Password</label>
        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
        />
    </div>

    <button type="submit" style="margin-top: 1rem;">
        Update Password
    </button>

    @if (session('status') === 'password-updated')
        <p style="color: green;">Password updated.</p>
    @endif
</form>
