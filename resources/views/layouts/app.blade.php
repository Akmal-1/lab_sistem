<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Application</title>

    <!-- Menyertakan file CSS yang dihasilkan oleh Vite -->
    @vite(['resources/css/app.css'])

    <!-- Menyertakan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Menyertakan Bootstrap Icons untuk ikon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Menyertakan partial untuk navbar -->
    @include('partials.navbar')

    <div class="container mt-4">
        <!-- Menyertakan konten spesifik dari setiap halaman -->
        @yield('content')
    </div>

    <!-- Menyertakan file JS yang dihasilkan oleh Vite -->
    @vite(['resources/js/app.js'])

    <!-- Menambahkan jQuery dan Bootstrap JS dari CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Stack untuk skrip spesifik halaman -->
    @stack('scripts')
</body>
</html>
