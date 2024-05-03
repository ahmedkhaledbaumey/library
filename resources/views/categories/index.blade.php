<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="container mt-4">
        <h2>Categories</h2>
        
        @include('layouts.messages')

        <ul class="list-group">
            @forelse ($categories as $category)
                <li class="list-group-item category-item d-flex justify-content-between align-items-center">
                    <strong>{{ $category->title }}</strong>
                    <div class="actions">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-sm mr-2">show</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="list-group-item">No categories available.</li>
            @endforelse
        </ul>

        <a href="{{ route('categories.create') }}" class="btn btn-primary mt-3">Create Category</a>
    </div>

    <style>
        /* Add this style to your CSS to set a fixed height for the category items */
        .category-item {
            height: 60px; /* Adjust the height as needed */
        }
    </style>
@endsection
