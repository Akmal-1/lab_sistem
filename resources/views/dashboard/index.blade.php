@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard - {{ Auth::user()->firstRole->name ?? 'User' }}</h1>

    <!-- Content berdasarkan role -->
    @if(Auth::user()->hasRole('Quality Control'))
        @include('dashboard.quality_control')
    @else
        <!-- Halaman dashboard umum atau fallback jika role tidak dikenali -->
        <p>Selamat datang di dashboard.</p>
    @endif
@endsection
