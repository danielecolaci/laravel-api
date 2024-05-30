@extends('layouts.admin')

@section('title', 'Create New Project')

@section('content')
    <div class="container py-5">

        @include('partials.validation-message')

        <h4 class="text-muted mb-3">Create New Project</h4>

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelper" placeholder="Enter title" />
                <small id="titleHelper" class="form-text text-muted">Enter the title for this project</small>
                @error('title')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle"
                    id="subtitle" aria-describedby="subtitleHelper" placeholder="Enter subtitle"
                    value="{{ old('subtitle') }}" />
                <small id="subtitleHelper" class="form-text text-muted">Enter the subtitle for this project</small>
                @error('subtitle')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelper" value="{{ old('image') }}" />
                <small id="imageHelper" class="form-text text-muted">Upload the image of this project</small>
                @error('image')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option selected disabled>Select a Category</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ ($type->id == old('type_id')) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                <a href="{{ route('admin.types.index') }}" class="btn btn-info text-white mt-2">Manage Types</a>
                @error('type')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date"
                    aria-describedby="dateHelper" value="{{ old('date') }}" />
                <small id="dateHelper" class="form-text text-muted">Enter the date of this project</small>
                @error('date')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="technologies" class="form-label">Technologies</label>
                <br>
                <div class="mb-3 btn-group" role="group" aria-label="Technologies">
                    @foreach ($technologies as $technology)
                        <input name="technologies[]" type="checkbox" class="btn-check"
                            id="technology-{{ $technology->id }}" value="{{ $technology->id }}" />
                        <label class="btn btn-outline-info" for="technology-{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    @endforeach
                </div>

                @error('technologies')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror

                <br>
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-info text-white">Manage
                    Technologies</a>
            </div>

            <div class="mb-3">
                <label for="url_code" class="form-label">URL Code</label>
                <input type="text" class="form-control @error('url_code') is-invalid @enderror" name="url_code"
                    id="url_code" aria-describedby="urlCodeHelper" placeholder="Enter URL for code"
                    value="{{ old('url_code') }}" />
                <small id="urlCodeHelper" class="form-text text-muted">Enter the URL for the code of this project</small>
                @error('url_code')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="url_web" class="form-label">URL Web</label>
                <input type="text" class="form-control @error('url_web') is-invalid @enderror" name="url_web"
                    id="url_web" aria-describedby="urlWebHelper" placeholder="Enter URL for web"
                    value="{{ old('url_web') }}" />
                <small id="urlWebHelper" class="form-text text-muted">Enter the URL for the web of this project</small>
                @error('url_web')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-info text-white">Create</button>
        </form>
    </div>
@endsection
