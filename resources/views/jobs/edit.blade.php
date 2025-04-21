@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold text-center mb-6">Edit Job</h2>

    <form method="POST" action="{{ route('jobs.update', $job->id) }}">
        @csrf
        @method('PUT')

        <label for="title">Job Title</label>
        <input type="text" name="title" id="title" value="{{ $job->title }}" required>

        <label for="location">Job Location</label>
        <input type="text" name="location" id="location" value="{{ $job->location }}" required>

        <label for="description">Job Description</label>
        <textarea name="description" id="description" required>{{ $job->description }}</textarea>

        <button type="submit">Update Job</button>
    </form>
@endsection
