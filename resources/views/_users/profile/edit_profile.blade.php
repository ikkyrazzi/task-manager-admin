@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('_users.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                        </div>

                        <!-- Profile Photo Field -->
                        <div class="form-group">
                            <label for="profile_photo_path">Profile Photo</label>
                            <input type="file" id="profile_photo_path" name="profile_photo_path" class="form-control">
                            @if ($user->profile_photo_path)
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Photo" width="100" class="mt-2">
                            @else
                                <p class="mt-2">No photo available</p>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                    <!-- Back to Profile Button -->
                    <a href="{{ route('_users.profile.my_profile') }}" class="btn btn-secondary mt-3">Back to My Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
