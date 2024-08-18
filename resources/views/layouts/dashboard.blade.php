<!-- resources/views/layouts/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ Auth::user()->roles()->first()->name ?? 'Dashboard' }} Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        @stack('css') <!-- Stack untuk menambahkan CSS khusus per role -->
    </head>
    
    <body>
        <div class="main-container">
            <nav>
                <ul>
                    <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>

            <?php
            $roleTranslations = [
                'quality_control' => 'Quality Control',
                'operator_lab' => 'Operator Lab',
                // Tambahkan role lain di sini
            ];

            $roleName = $roleTranslations[Auth::user()->roles()->first()->name] ?? Auth::user()->roles()->first()->name;
            ?>

            <div class="content-container">
                <div class="card">
                    <div class="card-header">
                        Dashboard - {{ $roleName }}
                    </div>
                </div>

                <div class="card-request">
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>        

        <script src="{{ asset('js/sample.js') }}"></script>
        @stack('scripts') <!-- Stack untuk menambahkan script JS khusus per role -->
    </body>
</html>
