<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    
    @if($role == 'quality_control')
        <h2>Quality Control Dashboard</h2>
        <!-- Konten khusus untuk Quality Control -->
        <p>Here are your tasks for sample analysis.</p>
    @elseif($role == 'operator_lab')
        <h2>Operator Lab Dashboard</h2>
        <!-- Konten khusus untuk Operator Lab -->
        <p>Here are the samples you need to process.</p>
    @else
        <h2>General Dashboard</h2>
        <!-- Konten umum untuk role lainnya -->
        <p>Welcome to your dashboard.</p>
    @endif

</body>
</html>
