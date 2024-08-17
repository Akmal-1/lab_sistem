<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="logo">
            <!-- Path gambar -->
            <img src="{{ asset('images/PT-Timah-Industri.png') }}" alt="Company Logo">
        </div>
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            
            <!-- Tambahkan blok kode ini untuk menampilkan pesan error -->
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-login">Login</button>
            </div>
        </form>
        <div class="options">
            <a href="#" class="forgot-password">Lupa Password?</a>
            <span class="separator">|</span>
            <a href="{{ route('register') }}" class="register">Daftar</a>
        </div>
        <div class="error-message" id="errorMessage"></div>
    </div>
</body>
</html>
