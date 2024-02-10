<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config("app.name", "Laravel") }}</title>
    <link rel="shortcut icon" href="{{ asset("assets/images/logo/kandari_logo.png") }}" type="image/x-icon" />
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/lineicons.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/materialdesignicons.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/fullcalendar.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/lineicons.css") }}" />
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    @vite("resources/sass/app.scss")
    @stack("header-script")

</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has("login"))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url("/home") }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    {{-- <a href="{{ route("login") }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has("register"))
                        <a href="{{ route("register") }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif --}}
                    @include("auth.login")
                @endauth
            </div>
        @endif


    </div>
</body>

</html>
