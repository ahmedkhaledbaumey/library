<!-- resources/views/books/index.blade.php -->
@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <h2>Books</h2>

    @include('layouts.messages')

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($books as $book)
            <div class="col">
                <div class="card h-100" style="min-height: 350px;">
                    <img src="{{ asset('storage/public/images/books/' . $book->image) }}" alt="{{ $book->name }}" style="width: 200px; height: 200px;" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->name }}</h5>
                        <p class="card-text">Category: {{ $book->category->title }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-success">View Details</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="post" onsubmit="return confirm('Are you sure you want to d elete this book?')">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No books available.</p>
        @endforelse
    </div>

    {{ $books->links() }}

    <a href="{{ route('books.create') }}" class="btn btn-primary create-btn">Create Book</a>
@endsection
