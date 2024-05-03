<!-- resources/views/categories/show.blade.php -->
@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
    <h2>Category Details</h2>
    <p><strong>Title:</strong> {{ $category->title }}</p>
    <a href="{{ route('categories.index') }}">Back to Categories</a>
@endsection
