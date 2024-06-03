<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/png" href="../assets/img/favicon.png">
      <title>@yield('title') | {{ config('app.name', 'My App') }}</title>
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href='https://fonts.googleapis.com/css?family=Ubuntu Mono' rel='stylesheet'>
    <!-- My Css -->
    <link id="pagestyle" href="../assets/css/admin.css" rel="stylesheet" />
    <!-- My Css -->

    <script src="https://cdn.tailwindcss.com"></script>

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
