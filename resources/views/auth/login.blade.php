<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Panggil CSS dari public/css -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/PT-Timah-Industri.svg') }}" alt="Company Logo">
        </div>
        <h2>Login</h2> <!-- Konsistensi dengan halaman register -->
        <form method="POST" action="{{ route('login') }}">
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
                <label for="email">{{ __('Email Address') }}</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" id="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-login">{{ __('Login') }}</button>
            </div>
        </form>
        <div class="options">
            <a href="{{ route('register') }}" class="register">Belum Punya Akun? Register</a>
        </div>
    </div>
</body>
</html>
