<!-- resources/views/books/show.blade.php -->
@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
    <div class="container">
        <h2>Book Details</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $book->name }}</h5>
                <p class="card-text"><strong>Price:</strong> ${{ $book->price }}</p>
                <p class="card-text"><strong>Category:</strong> {{ $book->category->title }}</p>
                <!-- Add other details as needed -->
            </div>
            <img src="{{ asset('storage/public/images/books/' . $book->image) }}" alt="{{ $book->name }}" class="card-img-top img-fluid" style="width: 100px; height: 100px;">
        </div>

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Back to Books</a>
    </div>
@endsection
