@extends('layouts.admin')

@section('title', 'Manage Technologies')

@section('content')
    <div class="container">
        <h1 class="my-5">Technologies</h1>

        <form id="createTechnologyForm" action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="newTechnologyName" name="name" placeholder="Technology name"
                    aria-label="Technology name">
                <button class="btn btn-outline-info" type="submit">Create New Technology</button>
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
                @forelse ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->name }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                data-bs-target="#editModal-{{ $technology->id }}">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $technology->id }}">Delete</button>

                            {{-- Edit --}}
                            <div class="modal fade" id="editModal-{{ $technology->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel-{{ $technology->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel-{{ $technology->id }}">Edit
                                                Technology</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="editTechnologyForm"
                                                action="{{ route('admin.technologies.update', $technology->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="name-{{ $technology->id }}" class="form-label">Name</label>
                                                    <input type="text" class="form-control"
                                                        id="name-{{ $technology->id }}" name="name"
                                                        value="{{ $technology->name }}">
                                                </div>
                                                <button type="submit" class="btn btn-info text-white">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Delete --}}
                            <div class="modal fade" id="deleteModal-{{ $technology->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel-{{ $technology->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $technology->id }}">Confirm
                                                Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete "{{ $technology->name }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.technologies.destroy', $technology->id) }}"
                                                method="POST">
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
                        <td colspan="3">No technologies found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <button class="btn btn-info text-white my-5 w-25 position-relative start-50 translate-middle"
            onclick="history.back()">Back</button>
    </div>
@endsection
