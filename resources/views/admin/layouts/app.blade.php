<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ABI - Admin</title>
    <link rel="stylesheet" href="/styles/style.css" />
    
  </head>
  <body>
    <section class="adminsection">
      <button id="toggle-sidebar" class="hamburger">☰</button>     
      @include('admin.layouts.sidebar')
      @yield('content')
      
    </section>
    @include('admin.layouts.footer')

 
    <script src="/js/toggle.js"></script>
  </body> 
</html>
