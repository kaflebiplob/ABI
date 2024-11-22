<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin panel</title>
    <link rel="stylesheet" href="/styles/style.css" />
  </head>

  <body>
    <section class="adminsection">
      <button id="toggle-sidebar" class="hamburger">☰</button>
      @include('admin.layouts.sidebar')
      @yield('content')
      @include('admin.layouts.footer')

     
    </section>
    <script src="/js/toggle.js"></script>
  </body>
</html>
