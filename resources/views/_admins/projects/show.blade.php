@extends('layouts.admin.main')

@section('title', 'Project Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Project Details</span></h4>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <p class="form-control-plaintext">{{ $project->name }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <p class="form-control-plaintext">{{ $project->description }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Start Date</label>
                <p class="form-control-plaintext">{{ $project->start_date }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">End Date</label>
                <p class="form-control-plaintext">{{ $project->end_date }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <p class="form-control-plaintext">{{ ucfirst($project->status) }}</p>
            </div>
            <a href="{{ route('_admins.projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('_admins.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('_admins.projects.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
