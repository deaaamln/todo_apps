<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="css/styles.css" />
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Register User | MyTodoList</title>
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css" />

    <style>
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.1;
            object-fit: cover;
        }

        .form-container {
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader">
        <img src="assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div> -->
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <img src="images/register-bg.jpg" alt="background" class="background-image">
            <div class="container form-container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="authentication-login bg-body p-4 rounded">
                            <h2 class="mb-4 text-center">Register to MyTodoList</h2>
                            <form action="{{ route('proccessRegister') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{ old('name') }}" name="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ old('email') }}" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button class="btn w-100 py-2 rounded text-white" type="submit" style="background-color: #ffae1f;">Buat Akun</button>
                            </form>
                            <div class="text-center mt-4">
                                <p class="mb-0">Sudah punya akun?</p>
                                <a class="fw-medium" href="{{ route('login') }}" style="color: #ffae1f;">Masuk disini</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
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