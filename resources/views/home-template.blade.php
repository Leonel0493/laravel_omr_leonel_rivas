<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- styles -->
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
  <style>
    :root{
      --tran-05: all 0.5s ease;
      --tran-03: all 0.3s ease;
      --tran-02: all 0.2s ease;
    }

    #logoImage{
      min-width: 45px;
    }

    #menuItems{
      height: calc(100% - 90px);
    }

    #menuItems li a i{
      min-width: 45px;
    }

    #modeToggle{
      min-width: 45px;
    }

    #switch{
      position: relative;
      display: inline-block;
      height: 22px;
      width: 40px;
      border-radius: 25px;
      background-color: rgb(226 232 240);
    }

    #switch:before{
      content: "";
      position: absolute;
      left: 5px;
      top: 50%;
      transform: translateY(-50%);
      left: 5px;
      height: 15px;
      width: 15px;
      background-color: rgb(255 255 255);
      border-radius: 50%;
    }
  </style>

  <!-- scripts -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>OMR | Dashboard</title>
</head>
<body class="min-h-screen bg-gray-100">
  <!-- nav -->
  <nav class="fixed bg-white top-0 left-0 h-full w-64 pt-3 pl-3">
    <!-- Nav header -->  
    <div id="logoName" class="flex items-center">
      <div id="logoImage" class="flex justify-center">
        <img src="{{ asset('logo.jpeg') }}" alt="main logo" class="w-10 object-cover rounded-full" />
      </div>
      <span id="logo_name" class="ml-4 font-light text-xl">OMR - Test App</span>
    </div>

    <!-- menu -->
    <div id="menuItems" class="mt-10 flex flex-col justify-between">
      <!-- site links -->
      <ul id="navLinks">
        <li>
          <a href="#" class="flex items-center h-12 relative text-gray-500 hover:text-sky-700 dark:text-white dark:hover:text-gray-500">
          <i class="fa-solid fa-house h-full flex items-center justify-center text-2xl"></i>
            <span id="linkName" class="text-lg font-normal">Inicio</span>
          </a>
        </li>
      </ul>

      <!-- logout -->
      <ul id="logoutMod">
        <li>
          <a href="{{ route('logout') }}" class="flex items-center h-12 relative text-gray-500 hover:text-sky-700">
            <i class="fa-solid fa-right-from-bracket h-full flex items-center justify-center text-2xl"></i>
            <span id="linkName" class="text-lg font-normal">logout</span>
          </a>
        </li>

        <!-- dark mode -->
        <li class="flex items-center">
          <a href="#" class="flex items-center h-12 text-gray-500 hover:text-sky-700">
            <i class="fa-solid fa-moon h-full flex items-center justify-center text-2xl"></i>
            <span id="linkName" class="text-lg font-normal">dark mode</span>
          </a>

          <div id="modeToggle" class="h-12 absolute right-3 flex items-center justify-center">
            <span id="switch"></span>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  
  <!-- scripts -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 

  <!-- documents scripts -->
  <script>
    const html = document.querySelector("html"),
          modeToggle = document.querySelector("#modeToggle");

    modeToggle.addEventListener("click", () => {
      html.classList.toggle("dark");
    })
  </script>
</body>
</html>