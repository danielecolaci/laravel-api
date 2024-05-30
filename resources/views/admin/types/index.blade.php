@extends('layouts.admin')

@section('title', 'Manage Types')

@section('content')
    <div class="container">
        <h1 class="my-5">Types</h1>

        <form id="createTypeForm" action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="newTypeName" name="name" placeholder="Type name"
                    aria-label="Type name">
                <button class="btn btn-outline-info" type="submit">Create New Type</button>
            </div>
        </form>

        <table class="table my-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->slug }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                data-bs-target="#editModal-{{ $type->id }}">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $type->id }}">Delete</button>

                            {{-- Edit --}}
                            <div class="modal fade" id="editModal-{{ $type->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel-{{ $type->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel-{{ $type->id }}">Edit Type</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="editTypeForm" action="{{ route('admin.types.update', $type->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="name-{{ $type->id }}" class="form-label">Name</label>
                                                    <input type="text" class="form-control"
                                                        id="name-{{ $type->id }}" name="name"
                                                        value="{{ $type->name }}">
                                                </div>
                                                <button type="submit" class="btn btn-info text-white">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Delete --}}
                            <div class="modal fade" id="deleteModal-{{ $type->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel-{{ $type->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $type->id }}">Confirm
                                                Delete
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete "{{ $type->name }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No types found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <button class="btn btn-info text-white my-5 w-25 position-relative start-50 translate-middle"
            onclick="history.back()">Back</button>
    </div>
@endsection
