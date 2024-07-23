@extends('layouts.admin.main')

@section('title', 'All Tasks')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">All Tasks</span></h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tasks</h5>
            <a href="{{ route('_admins.tasks.create') }}" class="btn btn-primary">Add</a>
        </div>
        
        <div class="table-responsive text-nowrap">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Assigned To</th>
                        <th class="text-center">Due Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Priority</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($tasks as $index => $task)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $task->title }}</td>
                        <td class="text-center">{{ $task->description }}</td>
                        <td class="text-center">{{ $task->assigned_to_user->name }}</td>
                        <td class="text-center">{{ $task->due_date }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $task->status_color }}">{{ ucfirst($task->status) }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-{{ $task->priority_color }}">{{ ucfirst($task->priority) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('_admins.tasks.show', $task->id) }}">
                                        <i class="bx bx-show-alt me-1"></i> Show
                                    </a>
                                    <a class="dropdown-item" href="{{ route('_admins.tasks.edit', $task->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('_admins.tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
