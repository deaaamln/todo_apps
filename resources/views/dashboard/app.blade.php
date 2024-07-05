<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />

    <!-- Core Css -->
    <link rel="stylesheet" href="css/styles.css" />

    <title>@yield('title', 'Dashboard') | MyTodoList</title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader">
        <img src="assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div> -->
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        @include('dashboard.sidebar')
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            @include('dashboard.header')
            <!--  Header End -->

            <div class="body-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/app.init.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/simplebar.min.js"></script>

    <script src="js/sidebarmenu.js"></script>
    <script src="js/theme.js"></script>

    <script src="js/owl.carousel.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>