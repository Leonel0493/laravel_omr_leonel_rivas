<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdn.tailwindcss.com"></script>
  
  <title>Welcome!</title>

  <style>
    .form.login {
        position: absolute;
        left: 50%;
        bottom: -86%;
        transform: translateX(-50%);
        width: calc(100% + 220px);
        padding: 20px 140px;
        border-radius: 50%;
        height: 100%;
        transition: all 0.6s ease;
    }

    #wrapper.active .form.login {
        bottom: -15%;
        border-radius: 35%;
        box-shadow: 0 -5px 10px rgba(0,0,0,0.1);
    }

    #toastWarning{
        transform: translateX(calc(100% + 69px));
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35)
    }

    #toastWarning.active{
        transform: translateX(0%);
    }

    #toastProgressWarning{
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width:100%;
        background: color: rgb(234 179 8);
    }

    #toastProgressWarning:before{
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        height: 100%;
        width:100%;
        background: rgb(234 179 8);
    }

    #toastProgressWarning.active:before{
        animation: progress 5s linear forwards;
    }

    /* * */
    #toastError{
        transform: translateX(calc(100% + 69px));
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35)
    }

    #toastError.active{
        transform: translateX(0%);
    }

    #toastProgressError{
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width:100%;
        background: color: rgb(239 68 68);
    }

    #toastProgressError:before{
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        height: 100%;
        width:100%;
        background: rgb(239 68 68);
    }

    #toastProgressError.active:before{
        animation: progress 5s linear forwards;
    }

    @keyframes progress{
        100%{
            right: 100%;
        }
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-200">
  <section id="wrapper" class="relative max-w-md w-full rounded-xl px-8 pt-5 pb-32 bg-blue-500 shadow-md overflow-hidden">
    <div id="signup" class="">
        <header class="text-center text-white text-5xl font-semibold">
            Signup
        </header>
        <form id="frmSignup" class="flex flex-col gap-5 mt-10">
            @csrf
            <input class="h-14 border-none outline-none p-4 font-normal text-sm text-gray-800 rounded-lg bg-white" type="text" placeholder="Full name" name="name" autocomplete="off" required />
            <input class="h-14 border-none outline-none p-4 font-normal text-sm text-gray-800 rounded-lg bg-white" type="text" placeholder="Email Address" name="email" autocomplete="off" required />
            <input class="h-14 border-none outline-none p-4 font-normal text-sm text-gray-800 rounded-lg bg-white" type="password" placeholder="Password" name="password" required />
            
            <div class="flex items-center gap-3">
                <input class="h-4 w-4 accent-white cursor-pointer border-none outline-none p-4 font-normal text-sm text-gray-800 rounded-lg" type="checkbox" name="" id="signupCheck">
                <label class="text-white cursor-pointer" for="signupCheck">I accept all terms and conditions</label>
            </div>

            <input class="h-14 border-none outline-none font-medium text-gray-800 rounded-lg bg-white mt-4 p-0 text-lg" type="submit" value="Signup" />
        </form>
    </div>

    <div class="form login bg-white">
        <header class="text-center text-gray-800 text-5xl font-semibold cursor-pointer">
            Login
        </header>
        <form id="frmLogin" class="flex flex-col gap-5 mt-10">
            <input class="h-14 outline-none p-4 font-normal text-sm text-gray-800 rounded-lg bg-white border border-gray-500 focus:shadow-md" type="text" placeholder="Email Address" name="email" autocomplete="off" required />
            <input class="h-14 outline-none p-4 font-normal text-sm text-gray-800 rounded-lg bg-white border border-gray-500 focus:shadow-md" type="password" placeholder="Password" name="password" autocomplete="off" required />
            
            <a href="#" class="text-white hover:underline">forgot password?</a>

            <input class="h-14 border-none outline-none font-medium text-white rounded-lg bg-blue-500 mt-4 p-0 text-lg" type="submit" value="Login" />
        </form>
    </div>
  </section>

  <!-- TOAST WARNING -->
  <div id="toastWarning" class="bg-white hidden shadow-md absolute top-6 right-9 rounded-lg pt-5 pl-7 pr-6 pb-5 border-l-4 overflow-hidden border-yellow-500">
    <div id="toast-content" class="flex items-center">
        <i class="fa-solid fa-exclamation bg-yellow-500 text-white rounded-full flex items-center justify-center w-9 h-9 text-lg"></i>
        <div id="message" class="flex flex-col mt-0 ml-5">
            <div id="text-1" class="text-xl font-semibold">Advertencia!</div>
            <div id=textWarning></div>
        </div>
    </div>
    
    <i id="toastWarningClose" class="fa-solid fa-xmark absolute top-2 right-4 p-1 cursor-pointer opacity-70 hover:opacity-100"></i>
    <div id="toastProgressWarning" class=""></div>
  </div>

  <!-- TOAST ERROR -->
  <div id="toastError" class="bg-white hidden shadow-md absolute top-6 right-9 rounded-lg pt-5 pl-7 pr-6 pb-5 border-l-4 overflow-hidden border-red-500">
    <div id="toast-content" class="flex items-center">
        <i class="fa-solid fa-exclamation bg-red-500 text-white rounded-full flex items-center justify-center w-9 h-9 text-lg"></i>
        <div id="message" class="flex flex-col mt-0 ml-5">
            <div id="text-1" class="text-xl font-semibold">Advertencia!</div>
            <div id=textError></div>
        </div>
    </div>
    
    <i id="toastErrorClose" class="fa-solid fa-xmark absolute top-2 right-4 p-1 cursor-pointer opacity-70 hover:opacity-100"></i>
    <div id="toastProgressError" class=""></div>
  </div>
  

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    const wrapper = document.querySelector("#wrapper"),
          signupHeader = document.querySelector("#signup header"),
          loginHeader = document.querySelector(".login header"),
          toastWarning = document.getElementById("toastWarning"),
          closeToastWarning = document.querySelector("#toastWarningClose"),
          progressWarning = document.querySelector('#toastProgressWarning'),
          textWarning = document.querySelector('#textWarning'),
          toastError = document.getElementById("toastError"),
          closeToastError = document.querySelector("#toastErrorClose"),
          progressError = document.querySelector('#toastProgressError'),
          textError = document.querySelector('#textError'),
          frmSignup = document.getElementById("frmSignup");
    
    loginHeader.addEventListener("click", () => {
        wrapper.classList.add("active");
    });

    signup.addEventListener("click", () => {
        wrapper.classList.remove("active");
    });

    closeToastWarning.addEventListener("click", () => {
        toastWarning.classList.add('hidden');
        toastWarning.classList.remove('active');
        progressWarning.classList.remove('active');
    })

    closeToastError.addEventListener("click", () => {
        toastError.classList.add('hidden');
        toastError.classList.remove('active');
        progressError.classList.remove('active');
    })

    $('#frmSignup').on('submit', (e) => {
        e.preventDefault();

        let data = new FormData($('#frmSignup')[0]);

        $.ajax({
            url: "{{ route('register-user') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                frmSignup.reset();
                if(data.message === 'Success')
                    window.location.href = "{{route('home')}}";
                else
                {
                    textWarning.innerHTML = data.message;
                    toastWarning.classList.remove('hidden');
                    toastWarning.classList.add('active');
                    progressWarning.classList.add('active');
                    
                    setTimeout(() => {
                        toastWarning.classList.remove('active');
                        progressWarning.classList.remove('active');
                        toastWarning.classList.add('hidden');
                    }, 5000);
                }
                
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('#frmLogin').on('submit', (e) => {
        e.preventDefault();

        let data = new FormData($('#frmLogin')[0]);

        $.ajax({
            url: "{{ route('login-user') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data.message);
                frmSignup.reset();
                if(data.message === 'Success')
                    window.location.href = "{{route('home')}}";
                else
                {
                    toastError.classList.remove('hidden');
                    setTimeout(() => {
                        textError.innerHTML = data.message;
                        toastError.classList.add('active');
                        progressError.classList.add('active');
                        setTimeout(() => {
                            toastError.classList.remove('active');
                            progressError.classList.remove('active');
                            toastError.classList.add('hidden');
                        }, 5000);
                    }, 10);
                }
                
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
  </script>
</body>
</html>