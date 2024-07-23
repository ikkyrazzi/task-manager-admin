@extends('layouts.admin.main')

@section('title', 'All Notifications')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">All Notifications</span></h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Notifications</h5>
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
                        <th class="text-center">User</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Read At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($notifications as $index => $notification)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $notification->user->name }}</td>
                        <td class="text-center">{{ ucfirst(str_replace('_', ' ', $notification->type)) }}</td>
                        <td class="text-center">{{ json_encode($notification->data) }}</td>
                        <td class="text-center">{{ $notification->read_at }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('_admins.notifications.show', $notification->id) }}">
                                        <i class="bx bx-show-alt me-1"></i> Show
                                    </a>
                                    <form action="{{ route('_admins.notifications.destroy', $notification->id) }}" method="POST" style="display:inline;">
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
