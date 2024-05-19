<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | {{ config('app.name', 'My App') }}</title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard Mahasiswa</title>
        <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite('resources/css/app.css') --}}
    {{-- @vite([]) --}}
</head>
<body>
    @yield('content')

    @stack('scripts')
</body>
<footer>
    <div>
    </div>
</footer>
</html>
