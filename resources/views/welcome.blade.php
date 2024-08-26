@extends('layouts.app')

@section('title', 'Welcome to Our Application')

@section('content')
<div class="container text-center">
    <h1>Welcome to Our Application</h1>
    <p>Your starting point for exploring the features of this application.</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
</div>
@endsection
