@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold text-center mb-6">Job Listings</h2>

    @foreach($jobs as $job)
        <div class="mb-4">
            <h3 class="text-xl">{{ $job->title }}</h3>
            <p>{{ $job->location }}</p>
            <p>{{ $job->description }}</p>
            <a href="{{ route('jobs.show', $job->id) }}" class="text-blue-500">View</a> |
            <a href="{{ route('jobs.edit', $job->id) }}" class="text-blue-500">Edit</a> |
            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
        </div>
    @endforeach

    <a href="{{ route('jobs.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create New Job</a>
@endsection
