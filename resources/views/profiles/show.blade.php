@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-8">
        <h2 class="text-2xl font-bold text-center mb-6">Update Your Profile</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <label for="email" class="block text-sm font-medium text-gray-700 mt-4">Email</label>
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <label for="password" class="block text-sm font-medium text-gray-700 mt-4">Password (Leave empty to keep the same)</label>
            <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mt-4">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

            <button type="submit" class="mt-6 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Profile</button>
        </form>
    </div>
@endsection
