@extends('layouts.app')
@section('title', 'Login Form')
@section('content')
@include('layouts.messages')

<form action="{{route("login")}}" method="POST"> 
    @csrf
<input type="email" name="email"><br>
<input type="password" name="password"><br>
<button type="submit">Login </button>
</form>
@endsection