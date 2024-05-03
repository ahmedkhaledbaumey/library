<!-- resources/views/categories/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <div class="container">
        <h2>Create Category</h2>

        @include('layouts.messages')

        <form action="{{ route('categories.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter category title">
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
    </div>
@endsection
