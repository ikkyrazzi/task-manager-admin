@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>You are an Ketua.</h2>
                    <p>Manage your profile and other users from the links below:</p>

                    <a href="{{ route('_users.profile.my_profile') }}" class="btn btn-info">View My Profile</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
