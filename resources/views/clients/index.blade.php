@extends('layouts.app')

@section('content')

    <h1>Users List</h1>
    <p class="lead">Here's a list of all your users. <a href="{{route('clients.create')}}">Add a new one?</a></p>
    <hr>

@endsection