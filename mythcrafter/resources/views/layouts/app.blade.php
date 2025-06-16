<!DOCTYPE html>
<html lang="ru">
<head >
    <meta charset="UTF-8">
    <title>@yield('title', 'Character Creator')</title>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('layouts.navbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <main class="p-4">
        @yield('content')
    </main>
</body>
</html>
