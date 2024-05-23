<!-- lokasi file /views/layouts/monitor.blade.php -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Test Bootstrap</title>
      <link rel="icon" type="image/png" href="../assets/img/favicon.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
      @yield('content') <!-- Placeholder for page-specific content -->
      <!-- Include footer or other common elements here -->
      @stack('scripts')
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
  <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    
  </footer>
  

</html>