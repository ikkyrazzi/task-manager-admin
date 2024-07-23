@extends('layouts.admin.main')

@section('title', 'Show Task')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Show Task</span></h4>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <p class="card-text"><strong>Project:</strong> {{ $task->project->name }}</p>
            <p class="card-text"><strong>Assigned To:</strong> {{ $task->assignedTo->name }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
            <p class="card-text"><strong>Priority:</strong> {{ ucfirst($task->priority) }}</p>
            <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
