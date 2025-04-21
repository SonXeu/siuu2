@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold text-center mb-6">Create New Job</h2>

    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf

        <label for="title">Job Title</label>
        <input type="text" name="title" id="title" required>

        <label for="location">Job Location</label>
        <input type="text" name="location" id="location" required>

        <label for="description">Job Description</label>
        <textarea name="description" id="description" required></textarea>

        <button type="submit">Create Job</button>
    </form>
@endsection
