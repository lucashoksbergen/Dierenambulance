<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="DierenAmbulance is a service that provides emergency care and transportation for sick or injured animals.">
  <meta name="keywords" content="DierenAmbulance, animal rescue, emergency care, animal transport">
  <title>@yield('title', 'DierenAmbulance')</title>

      <!-- For iOS Safari -->
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  
      <!-- General theme color for supported browsers -->
        <meta name="theme-color" content="#000">
      
      <!-- For Microsoft Edge -->
        <meta name="msapplication-navbutton-color" content="#000">

  <!-- Global Styles -->
  <link rel="stylesheet" href="{{ asset('css/globals.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/layout-guest.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  
  <style> 
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap");

  </style>

  <!-- Additional page-specific styles -->
  @stack('styles')

</head>

<body>
  <!-- Navigation Component -->
  <nav style="background-color: #1f573a" > 

 

   <div class="logo"><img src="{{ asset('assets/img/LogoDAFRL-350x224-pub.jpg') }}" alt="" srcset=""></div>
    <a href="{{ route('show.login') }}" class="btn-login">Login In</a>

  </nav>




  <!-- Main Content Area -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <x-footer></x-footer>
  <!-- Global Scripts -->
  <script src="{{ asset('js/global.js') }}"></script>
  
  <script>
    const sideBar = document.getElementById('sidebar');

    function toggleSidebar(){
      sideBar.classList.toggle('show');
    }
  </script>

  <!-- Additional page-specific scripts -->
  @stack('scripts')
</body>
</html>