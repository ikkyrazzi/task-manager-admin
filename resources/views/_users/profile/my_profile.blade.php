@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>

                <div class="card-body">
                    <!-- Display User Information -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <p id="name">{{ $user->name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <p id="email">{{ $user->email }}</p>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <p id="type">{{ $user->type }}</p>
                    </div>

                    <div class="form-group">
                        <label for="profile_photo_path">Profile Photo</label>
                        @if($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Photo" width="100">
                        @else
                            <p>No photo available</p>
                        @endif
                    </div>

                    <!-- Edit and Change Password Buttons -->
                    <div class="mt-4">
                        <a href="{{ route('_users.profile.edit_profile') }}" class="btn btn-warning">Edit Profile</a>
                        <a href="{{ route('_users.profile.change_password') }}" class="btn btn-info">Change Password</a>
                    </div>

                    <a href="{{ route('_users.home') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
