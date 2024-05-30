@extends('layouts.admin')

@section('title', 'Manage Projects')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="mb-4 d-flex justify-content-center">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-info text-white w-25">Create New Project</a>
            </div>
            <h4 class="text-muted">All Projects</h4>

            @include('partials.session-message')

            <div class="row">
                @forelse ($projects as $project)
                    <div class="col-md-4 mb-4">
                        <div class="card">

                            @if (Str::startsWith($project->image, 'https://'))
                                <img loading="lazy" src="{{ $project->image }}" alt="{{ $project->title }}"
                                    class="card-img-top img-fluid">
                            @else
                                <img loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                                    alt="{{ $project->title }}" class="card-img-top img-fluid">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $project->subtitle }}</h6>
                                <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                                <p class="card-text"><small class="text-muted">{{ $project->url_code }}</small></p>
                                <a href="{{ route('admin.projects.show', $project) }}"
                                    class="btn btn-info text-white btn-sm">Show</a>
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                    class="btn btn-info text-white btn-sm">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $project->id }}">
                                    Delete</button>

                                <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $project->id }}">
                                                    Delete project
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this project:
                                                {{ $project->title }}


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>

                                                </form>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">No projects yet</div>
                    </div>
                @endforelse
            </div>
            <button class="btn btn-info text-white my-5 w-25 position-relative start-50 translate-middle"
                onclick="history.back()">Back</button>
        </div>
    </section>
@endsection
