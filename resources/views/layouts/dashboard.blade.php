<!-- resources/views/layouts/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ Auth::user()->roles()->first()->name ?? 'Dashboard' }} Dashboard</title>
        <!-- Hilangkan sementara link CSS dan JS untuk fokus pada kerangka -->
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

                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="card-request">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>  
        </div>

        @stack('scripts') <!-- Stack untuk menambahkan script JS khusus per role -->
    </body>
</html>
