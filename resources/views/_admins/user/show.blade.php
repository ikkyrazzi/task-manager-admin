@extends('layouts.admin.main')

@section('title', 'User Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Users / Detail</span></h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">User Details</h5>
            <a href="{{ route('_admins.user.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Name:</strong>
                </div>
                <div class="col-md-8">
                    {{ $user->name }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Email:</strong>
                </div>
                <div class="col-md-8">
                    {{ $user->email }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Type:</strong>
                </div>
                <div class="col-md-8">
                    {{ $user->type }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Profile Photo:</strong>
                </div>
                <div class="col-md-8">
                    @if ($user->profile_photo_path)
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Photo" class="img-thumbnail" width="150">
                    @else
                        No photo available
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
