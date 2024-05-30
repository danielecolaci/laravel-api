@extends('layouts.admin')

@section('title', $project->title)

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">

                    @if (Str::startsWith($project->image, 'https://'))
                        <img class="card-image w-100" loading="lazy" src="{{ $project->image }}" alt="{{ $project->title }}">
                    @else
                        <img class="card-image w-100" loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}">
                    @endif

                    <h5 class="card-title">{{ $project->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $project->subtitle }}</h6>
                    <p class="card-text">{{ $project->date }}</p>
                    <div class="badge text-bg-info text-white">
                        {{ $project->type ? $project->type->name : 'Uncategorized' }}
                    </div>
                    <p class="card-text">{{ $project->description }}</p>
                    <p><b>Technologies: </b>
                        @forelse ($project->technologies as $technology)
                            {{ $technology->name }}
                        @empty
                            There are no technologies linked
                        @endforelse
                    </p>
                    <a class="btn btn-outline-dark" href="{{ $project->url_code }}">Code</a>
                    <a class="btn btn-outline-dark" href="{{ $project->url_web }}">Web</a>
                </div>
            </div>

            <button class="btn btn-info text-white my-5 w-25 position-relative start-50 translate-middle"
                onclick="history.back()">Back</button>

        </div>
    </section>
@endsection
