<!-- resources/views/books/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create Book')

@section('content')
    <div class="container">
        <h2>Create Book</h2>

        @include('layouts.messages')

        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter book name">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" value="{{ old('price') }}" class="form-control" placeholder="Enter book price">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Book</button>
        </form>

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Back to Books</a>
    </div>
@endsection
