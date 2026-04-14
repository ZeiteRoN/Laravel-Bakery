@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded">

        <h2 class="text-xl mb-4">Profile Information</h2>

        @include('profile.partials.update-profile-information-form')

        <hr style="margin: 2rem 0;">

        <h2 class="text-xl mb-4">Update Password</h2>
        @include('profile.partials.update-password-form')
        <hr style="margin: 2rem 0;">

        <h2 class="text-xl mb-4">Delete Account</h2>
        @include('profile.partials.delete-user-form')

    </div>
@endsection
