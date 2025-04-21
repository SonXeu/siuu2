@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-8">
        <h2 class="text-2xl font-bold text-center mb-6">Company Information</h2>

        <div class="mb-4">
            <strong>Name: </strong> {{ $company->name }}
        </div>

        <div class="mb-4">
            <strong>Location: </strong> {{ $company->location }}
        </div>

        <div class="mb-4">
            <strong>Description: </strong> {{ $company->description }}
        </div>

        <a href="{{ route('company.edit') }}" class="text-blue-500">Edit Company Information</a>
    </div>
@endsection
