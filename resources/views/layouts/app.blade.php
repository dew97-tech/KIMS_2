<!DOCTYPE html>
<html lang="en">

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
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Include DataTables CSS and JS -->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">
    {{-- Bootstrap 5.3.2 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite("resources/sass/app.scss")
    @stack("header-script")
</head>

<body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="{{ route("home") }}">
                <img src="{{ asset("assets/images/logo/kandari_logo.png") }}" width="100" height="80"
                    alt="Brand_KIMS" />
            </a>
        </div>
        <nav class="sidebar-nav">
            @include("layouts.navigation")
        </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="d-flex flex-column main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn purple-btn btn-hover">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right mb-0">
                            <!-- profile start -->
                            @include("users.profile")
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section mt-3">
            <div class="container-fluid ">
                @yield("content")
            </div>
        </section>
        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer bg-white shadow-lg text-white fixed-bottom p-2 mt-auto">
            <div class="container-fluid">
                <div class="row">
                    <div
                        class="d-flex justify-content-between align-items-center col-md-12 order-last order-md-first text-center">
                        <div class="text-dark">
                            <b>&copy;</b> All Rights Reserved {{ date("Y") }}
                        </div>
                        <div class="copyright">
                            <p class="inline-block mb-0 text-dark">
                                Developed by :
                                <img src="{{ asset("assets/images/logo/kandari_logo.png") }}" alt="brand_logo"
                                    width="50px" height="40px">
                                <a href="https://kandari.tech/" rel="nofollow" target="_blank"
                                    class="p-0 m-0 text-decoration-none">
                                    <span class="text-primary">Kandari Technologies</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->
    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset("js/main.js") }}"></script>
    <script src="{{ asset("assets/js/Chart.min.js") }}"></script>
    <script src="{{ asset("assets/js/dynamic-pie-chart.js") }}"></script>
    <script src="{{ asset("assets/js/moment.min.js") }}"></script>
    <script src="{{ asset("assets/js/fullcalendar.js") }}"></script>
    <script src="{{ asset("assets/js/jvectormap.min.js") }}"></script>
    <script src="{{ asset("assets/js/world-merc.js") }}"></script>
    <script src="{{ asset("assets/js/polyfill.js") }}"></script>
    {{-- Push Scripts --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    @stack("plugin-scripts")
</body>

</html>
