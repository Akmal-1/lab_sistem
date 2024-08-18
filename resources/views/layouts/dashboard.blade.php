<!-- resources/views/layouts/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Auth::user()->roles()->first()->name ?? 'Dashboard' }} Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @stack('css') <!-- Stack untuk menambahkan CSS khusus per role -->
</head>
<body>

    <nav>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('profile') }}">Profile</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ Auth::user()->roles()->first()->name ?? 'Dashboard' }} Dashboard
            </div>
            <div class="card-body">
                <!-- Notifikasi Berhasil Login -->
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Bagian ini akan diganti oleh konten spesifik dari setiap role -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/sample.js') }}"></script>
    @stack('scripts') <!-- Stack untuk menambahkan script JS khusus per role -->
</body>
</html>
