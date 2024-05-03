<!-- resources/views/books/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <div class="container">
        <h2>Edit Book</h2>
        
        @include('layouts.messages')

        <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- You need to include this for the update method -->

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $book->name) }}" placeholder="Enter book name">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" name="price" value="{{ old('price', $book->price) }}" placeholder="Enter book price">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>

        @if ($book->image)
            <div class="mt-3">
                <strong>Current Image:</strong>
                <img src="{{ asset('storage/public/images/books/' . $book->image) }}" alt="{{ $book->name }}" style="width: 100px; height: 100px;"">
            </div>
        @else
            <p>No image available</p>
        @endif

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Back to Books</a>
    </div>
@endsection
