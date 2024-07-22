@extends('layouts.admin.main')

@section('title', 'All Users')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Users / Add</span></h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Add Users</h5>
            <a href="{{ route('_admins.user.index') }}" class="btn btn-primary">Back</a>
        </div>
        <form action="{{ route('_admins.user.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Enter Name"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Enter Email"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Enter Password"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password-confirm"
                        name="password_confirmation"
                        placeholder="Confirm Password"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select
                        class="form-select"
                        id="type"
                        name="type"
                        required
                    >
                        <option value="" disabled selected>Select User Type</option>
                        <option value="1">Admin</option>
                        <option value="2">Ketua</option>
                        <option value="3">Member</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
