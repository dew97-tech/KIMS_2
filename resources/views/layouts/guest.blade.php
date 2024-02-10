<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config("app.name", "Laravel") }}</title>
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
    @vite("resources/sass/app.scss")
</head>

<body>

    <div class="row g-0  auth-row" style="min-height: 100vh">
        @yield("content")
    </div>
    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset("js/main.js") }}"></script>
    <script src="{{ asset("assets/js/Chart.min.js") }}"></script>
    <script src="{{ asset("assets/js/dynamic-pie-chart.js") }}"></script>
    <script src="{{ asset("assets/js/moment.min.js") }}"></script>
    <script src="{{ asset("assets/js/fullcalendar.js") }}"></script>
    <script src="{{ asset("assets/js/jvectormap.min.js") }}"></script>
    <script src="{{ asset("assets/js/world-merc.js") }}"></script>
    <script src="{{ asset("assets/js/polyfill.js") }}"></script>
</body>

</html>
