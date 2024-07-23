@extends('layouts.admin.main')

@section('title', 'Comment Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Comment Details</span></h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Comment Details</h5>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <strong>User:</strong>
                </div>
                <div class="col-md-10">
                    {{ $comment->user->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <strong>Task:</strong>
                </div>
                <div class="col-md-10">
                    {{ $comment->task->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <strong>Comment:</strong>
                </div>
                <div class="col-md-10">
                    {{ $comment->comment }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <strong>Created At:</strong>
                </div>
                <div class="col-md-10">
                    {{ $comment->created_at }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
