@extends('layouts.admin.main')

@section('title', 'Change Password')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Profile / Change Password</span></h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Change Password</h5>
            <a href="{{ route('_admins.profile.my_profile') }}" class="btn btn-primary">Back</a>
        </div>

        <div class="card-body">
            <!-- Display Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('_admins.profile.update_password') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Current Password Field -->
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="current_password"
                        name="current_password"
                        required
                    />
                </div>

                <!-- New Password Field -->
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="new_password"
                        name="new_password"
                        required
                    />
                </div>

                <!-- Confirm New Password Field -->
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="new_password_confirmation"
                        name="new_password_confirmation"
                        required
                    />
                </div>

                <button type="submit" class="btn btn-success">Change Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
