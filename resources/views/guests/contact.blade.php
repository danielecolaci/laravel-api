@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="container mt-5">
        <h1 class="my-5">Contact Me</h1>
        <form>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-info mt-5">Send Message</button>
        </form>
    </div>
@endsection
