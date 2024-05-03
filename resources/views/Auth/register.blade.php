@extends('layouts.app')
@section('title', 'Register Form')
@section('content')
@include('layouts.messages')

<form action="{{route("register")}}" method="POST"> 
    @csrf
<input type="text" name="name"><br>
<input type="email" name="email"><br>
<input type="password" name="password"><br>
<input type="password" name="password_confirmation"><br> 
<button type="submit">register </button>
</form>
@endsection