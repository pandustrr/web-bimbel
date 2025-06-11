<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa - Sistem Informasi Bimbel Online</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('layouts.navbar')

    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>
</html>
