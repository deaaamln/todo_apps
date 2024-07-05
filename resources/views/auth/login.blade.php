<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css" />

    <title>Login User | MyTodoList</title>

    <style>
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.1;
            object-fit: cover;
        }

        .form-container {
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <!-- Preloader -->
    <!-- <div class="preloader">
        <img src="assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div> -->
    <div id="main-wrapper" class="w-100">
        <div class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <img src="images/login-bg.jpg" alt="background" class="background-image">
            <div class="container form-container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="bg-white p-4 rounded shadow">
                            <h2 class="mb-4 text-center">Welcome to MyTodoList</h2>
                            <form action="{{ route('authenticate') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" aria-describedby="email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn w-100 py-2 rounded text-white" style="background-color: #ffae1f;" type="submit">Masuk</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="fs-4 mb-0">Belum punya akun?</p>
                                <a class="fw-medium" href="{{ route('register') }}" style="color: #ffae1f;">Buat akun baru</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Core JS -->
    <script src="js/app.min.js"></script>
    <script src="js/app.init.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/theme.js"></script>
    <!-- Owl Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- ApexCharts -->
    <script src="js/apexcharts.min.js"></script>
    <!-- Dashboard JS -->
    <script src="js/dashboard.js"></script>
</body>

</html>