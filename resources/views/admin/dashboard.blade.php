@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4 text-center">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <div class="d-flex justify-content-evenly my-5">
                            <a class="btn btn-info btn-lg text-white" href="{{ url('/admin/projects') }}">Manage
                                Projects</a>
                            <a class="btn btn-info btn-lg text-white" href="{{ route('admin.types.index') }}">Manage
                                Types</a>
                            <a class="btn btn-info btn-lg text-white" href="{{ route('admin.technologies.index') }}">Manage
                                Technologies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
