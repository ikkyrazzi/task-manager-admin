@extends('layouts.admin.main')

@section('title', 'All Projects')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">All Projects</span></h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Projects</h5>
            <a href="{{ route('_admins.projects.create') }}" class="btn btn-primary">Add</a>
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
                        <th class="text-center">Name</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Start Date</th>
                        <th class="text-center">End Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($projects as $index => $project)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $project->name }}</td>
                        <td class="text-center">{{ $project->description }}</td>
                        <td class="text-center">{{ $project->start_date }}</td>
                        <td class="text-center">{{ $project->end_date }}</td>
                        <td class="text-center">
                            @php
                                $statusClasses = [
                                    'ongoing' => 'bg-warning text-dark',
                                    'completed' => 'bg-success text-white',
                                    'pending' => 'bg-secondary text-white',
                                ];
                            @endphp
                            <span class="badge rounded-pill {{ $statusClasses[$project->status] ?? 'bg-light text-dark' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('_admins.projects.show', $project->id) }}">
                                        <i class="bx bx-show-alt me-1"></i> Show
                                    </a>
                                    <a class="dropdown-item" href="{{ route('_admins.projects.edit', $project->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('_admins.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
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
