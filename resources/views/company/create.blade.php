@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-8">
        <h2 class="text-2xl font-bold text-center mb-6">Create Company</h2>

        <form method="POST" action="{{ route('company.store') }}">
            @csrf

            <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

            <label for="location" class="block text-sm font-medium text-gray-700 mt-4">Location</label>
            <input type="text" id="location" name="location" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

            <label for="description" class="block text-sm font-medium text-gray-700 mt-4">Description</label>
            <textarea id="description" name="description" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>

            <button type="submit" class="mt-6 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Company</button>
        </form>
    </div>
@endsection
