<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="text-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ config('app.name', 'My App') }}</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu Mono' rel='stylesheet'>

    <!-- My Css -->
    <link id="pagestyle" href="../assets/css/monitor.css" rel="stylesheet" />
    {{-- <link id="pagestyle" href="../assets/css/monitor-mobile.css" rel="stylesheet" /> --}}
    <!-- My Css -->

    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <!-- Slick Carousel -->

    @yield('refresh-time')
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite('resources/css/app.css') --}}
    {{-- @vite([]) --}}

    @yield('content')

    @stack('scripts')
</body>
<footer>
    @yield('footer')
</footer>
</html>
