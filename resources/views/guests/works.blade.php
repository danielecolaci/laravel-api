@extends('layouts.app')

@section('title', 'Works')

@section('content')
    <div class="container">
        <h1 class="my-5">Works</h1>
        <div class="row flex-row">
            @foreach ($projects as $project)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="row g-0">

                            <div class="col-md-4">
                                <img src="{{ asset($project->image) }}" class="card-img-top h-100 alt="{{ $project->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $project->subtitle }}</h6>
                                    <div class="badge text-bg-info text-white">
                                        {{ $project->type ? $project->type->name : 'Uncategorized' }}
                                    </div>
                                    <p class="card-text">{{ $project->description }}</p>
                                    <a class="btn btn-outline-dark btn-sm" href="{{ $project->url_code }}">Code</a>
                                    <a class="btn btn-outline-dark btn-sm" href="{{ $project->url_web }}">Web</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="btn btn-info text-white my-5 position-relative start-50 translate-middle btn-lg" href="#nav"><i
                class="fa-solid fa-arrow-up"></i></a>
    </div>
@endsection
