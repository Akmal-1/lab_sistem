<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/PT-Timah-Industri.svg') }}" alt="Company Logo">
        </div>
        <h2>Register</h2>
        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Pesan Error -->
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
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="Admin Lab">Admin</option>
                    <option value="Analist">Analist</option>
                    <option value="Foreman Lab">Foreman Lab</option>
                    <option value="Supervisor Lab">Supervisor Lab</option>
                    <option value="Manager">Manager</option>
                    <option value="General Manager">General Manager</option>
                    <option value="Quality Control">Quality Control</option>
                    <option value="Internal Customer">Internal Customer</option>
                    <option value="Guest">Guest</option> <!-- Perbaikan: ubah value ke "Guest" -->
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-login">Register</button>
            </div>
        </form>
        <div class="options">
            <a href="{{ route('login') }}" class="register">Sudah Punya Akun? Login</a>
        </div>
    </div>
</body>
</html>
