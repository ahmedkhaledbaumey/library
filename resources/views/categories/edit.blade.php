<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="container">
        <h2>Edit Category - {{ $category->title }}</h2>

        @include('layouts.messages')

        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @method('patch')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" value="{{ old('title', $category->title) }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
    </div>
@endsection
