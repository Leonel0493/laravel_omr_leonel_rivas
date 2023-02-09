<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Taildwond -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Personal CSS -->
  <link rel="stylesheet" href="{{ asset('app.css') }}" />
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}" />
  <title>OMR | Home</title>
</head>
<body>
  <nav>
    <!-- Nav header -->
    <div class="logo-name">
      <div class="logo-image">
        <img src="{{ asset('logo.jpeg') }}" alt="Gobierno de El Salvador - Logo">
      </div>

      <span class="logo_name">OMR</span>
    </div>

    <!-- menu items -->
    <div class="menu-items">
      <ul class="nav-links">
        <li>
          <a href="#">
            <i class="fa-solid fa-house-user"></i>
            <span class="link-name">Inicio</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-bars-progress"></i>
            <span class="link-name">Materias</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-list-check"></i>
            <span class="link-name">Tareas</span>
          </a>
        </li>
      </ul>

      <!-- nav footer -->
      <ul class="logout-mode">
        <li>
          <a href="{{ route('logout') }}">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="link-name">logout</span>
          </a>
        </li>

        <li class="mode">
          <a href="#">
            <i class="fa-solid fa-moon"></i>
            <span class="link-name">dark mode</span>
          </a>

          <div class="mode-toggle">
            <span class="switch"></span>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Dashboard -->
  <section class="dashboard">
    <div class="top">
      <i class="fa-solid fa-bars sidebar-toggle"></i>

      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Search here ..." />
      </div>

      <img src="{{ asset('profile.jpeg') }}" alt="">
    </div>

    <!-- Content -->
    <div class="dash-content">
      <div class="overview">
       @yield('main')
      </div>
    </div>
  </section>

  <script src="{{ asset('scripts.js') }}"></script>
</body>
</html>