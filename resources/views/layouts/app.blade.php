<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="DierenAmbulance is a service that provides emergency care and transportation for sick or injured animals.">
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
  <link rel="stylesheet" href="{{ asset('css/layout-app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap");
  </style>

  <!-- Additional page-specific styles -->
  @stack('styles')

</head>

<body>
  <!-- Navigation Component -->
  <nav style="background-color: #fff">
    <button class="showSidebar-btn" onclick="toggleSidebar()">Button</button>

    <div class="welcome-message">
      Welkom terug{{-- {{ auth()->user()->name }}! --}}
    </div>
    <form action="{{ route('transfer.form.logout') }}" method="GET" class="logout-form">
      @csrf
      <button type="submit" class="btn-logout">
        <svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M0 8.5C0 8.71217 0.0856026 8.91566 0.237976 9.06569C0.390349 9.21571 0.597012 9.3 0.8125 9.3H6.97937L5.11062 11.132C5.03447 11.2064 4.97403 11.2949 4.93278 11.3923C4.89153 11.4898 4.87029 11.5944 4.87029 11.7C4.87029 11.8056 4.89153 11.9102 4.93278 12.0077C4.97403 12.1051 5.03447 12.1936 5.11062 12.268C5.18616 12.343 5.27602 12.4025 5.37503 12.4431C5.47404 12.4837 5.58024 12.5046 5.6875 12.5046C5.79476 12.5046 5.90096 12.4837 5.99997 12.4431C6.09898 12.4025 6.18884 12.343 6.26438 12.268L9.51437 9.068C9.58835 8.99192 9.64633 8.9022 9.685 8.804C9.76626 8.60923 9.76626 8.39077 9.685 8.196C9.64633 8.0978 9.58835 8.00808 9.51437 7.932L6.26438 4.732C6.18862 4.65741 6.09868 4.59824 5.9997 4.55787C5.90072 4.5175 5.79464 4.49673 5.6875 4.49673C5.58036 4.49673 5.47428 4.5175 5.3753 4.55787C5.27632 4.59824 5.18638 4.65741 5.11062 4.732C5.03487 4.80659 4.97478 4.89514 4.93378 4.9926C4.89278 5.09006 4.87168 5.19451 4.87168 5.3C4.87168 5.40549 4.89278 5.50994 4.93378 5.6074C4.97478 5.70486 5.03487 5.79341 5.11062 5.868L6.97937 7.7H0.8125C0.597012 7.7 0.390349 7.78429 0.237976 7.93431C0.0856026 8.08434 0 8.28783 0 8.5ZM10.5625 0.5H2.4375C1.79103 0.5 1.17105 0.752856 0.713927 1.20294C0.256807 1.65303 0 2.26348 0 2.9V5.3C0 5.51217 0.0856026 5.71566 0.237976 5.86569C0.390349 6.01571 0.597012 6.1 0.8125 6.1C1.02799 6.1 1.23465 6.01571 1.38702 5.86569C1.5394 5.71566 1.625 5.51217 1.625 5.3V2.9C1.625 2.68783 1.7106 2.48434 1.86298 2.33431C2.01535 2.18429 2.22201 2.1 2.4375 2.1H10.5625C10.778 2.1 10.9847 2.18429 11.137 2.33431C11.2894 2.48434 11.375 2.68783 11.375 2.9V14.1C11.375 14.3122 11.2894 14.5157 11.137 14.6657C10.9847 14.8157 10.778 14.9 10.5625 14.9H2.4375C2.22201 14.9 2.01535 14.8157 1.86298 14.6657C1.7106 14.5157 1.625 14.3122 1.625 14.1V11.7C1.625 11.4878 1.5394 11.2843 1.38702 11.1343C1.23465 10.9843 1.02799 10.9 0.8125 10.9C0.597012 10.9 0.390349 10.9843 0.237976 11.1343C0.0856026 11.2843 0 11.4878 0 11.7V14.1C0 14.7365 0.256807 15.347 0.713927 15.7971C1.17105 16.2471 1.79103 16.5 2.4375 16.5H10.5625C11.209 16.5 11.829 16.2471 12.2861 15.7971C12.7432 15.347 13 14.7365 13 14.1V2.9C13 2.26348 12.7432 1.65303 12.2861 1.20294C11.829 0.752856 11.209 0.5 10.5625 0.5Z"
            fill="black" />
        </svg>
        Logout
      </button>
    </form>
  </nav>

  <aside id="sidebar">
    <button class="showSidebar-btn" onclick="toggleSidebar()">close</button>

    <a href="#">
      <div class="logo"><img src="{{ asset('assets/img/LogoDAFRL-350x224-pub.jpg') }}" alt=""></div>
    </a>

    <div class="division"></div>

    <div class="sidebar-links">

      <ul>
        <a href="{{ route('dashboard') }}">
          <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</li>
        </a>
        <a href="#">
          <li class="{{ request()->routeIs('welcome') ? 'active' : '' }}">
            <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M16 6.94C15.9896 6.84813 15.9695 6.75763 15.94 6.67V6.58C15.8919 6.47718 15.8278 6.38267 15.75 6.3L9.75 0.3C9.66734 0.222216 9.57282 0.158081 9.47 0.11H9.38C9.27841 0.0517412 9.16622 0.0143442 9.05 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V7C16 7 16 7 16 6.94ZM10 3.41L12.59 6H11C10.7348 6 10.4804 5.89464 10.2929 5.70711C10.1054 5.51957 10 5.26522 10 5V3.41ZM14 17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H8V5C8 5.79565 8.31607 6.55871 8.87868 7.12132C9.44129 7.68393 10.2044 8 11 8H14V17Z"
                fill="{{ request()->routeIs('welcome') ? '#fff' : '#4c7961' }}" />
            </svg>

            Meldingen
          </li>
        </a>
      </ul>

      <ul>
        <a href="#">
          <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Mijn Profiel</li>
        </a>
      </ul>

    </div>

  </aside>




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

    function toggleSidebar() {
      sideBar.classList.toggle('show');
    }
  </script>

  <!-- Additional page-specific scripts -->
  @stack('scripts')
</body>

</html>