@extends('layouts.admin.main')

@section('title', 'Notification Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Notification Details</span></h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Notification Details</h5>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <strong>User:</strong>
                </div>
                <div class="col-md-10">
                    {{ $notification->user->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <strong>Type:</strong>
                </div>
                <div class="col-md-10">
                    {{ ucfirst(str_replace('_', ' ', $notification->type)) }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <strong>Data:</strong>
                </div>
                <div class="col-md-10">
                    <pre>{{ json_encode($notification->data, JSON_PRETTY_PRINT) }}</pre>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <strong>Read At:</strong>
                </div>
                <div class="col-md-10">
                    {{ $notification->read_at }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
