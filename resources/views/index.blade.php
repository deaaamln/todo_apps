@extends('layouts.app')

@include('layouts.navbar')
<div id="main-wrapper flex-column">
    <div class="body-wrapper overflow-hidden pt-0" style="background-color: #F5F7F8;">
        <section id="hero" class="hero-section position-relative overflow-hidden mb-0 mb-lg-5">
            <div class="container-xxl p-5">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="hero-content my-5 my-xl-0">
                        <h6 class="d-flex align-items-center gap-2 fs-4 fw-semibold mb-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                            <i class="ti ti-rocket text-secondary fs-6"></i>Mulai catat dengan cepat.
                        </h6>
                        <h1 class="fw-bolder mb-7 fs-13 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                            Welcome To My Todo List <br>by.
                            <span class="" style="color: #ffae1f;"> Dea Meilani</span>
                        </h1>
                        <p class="fs-5 mb-5 text-dark fw-normal aos-init aos-animate" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        Lebih efisien dan aman, makin keren untuk semua catatan 
                        </p>
                    </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column">
                        <div class="d-sm-flex align-items-center gap-3 aos-init aos-animate mt-auto mb-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                            @if (Auth::check())
                                <a class="btn btn-warning px-5 py-6 btn-hover-shadow d-block mb-3 mb-sm-0" href="{{ route('todos') }}">Mulai Catatan</a>
                            @else
                                <a class="btn btn-warning px-5 py-6 btn-hover-shadow d-block mb-3 mb-sm-0" href="{{ route('login') }}">Mulai Catatan</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="about" class="py-md-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 px-5">
                        <div class="card c2a-box aos-init aos-animate pt-7 p-4" data-aos="fade-up" data-aos-delay="1600"
                            data-aos-duration="1000">
                            <div class="card-body text-center p-4 pt-7">
                                <img src="../assets/images/profile/user-2.jpg" class="rounded-1 img-fluid"
                                    width="90">
                                <h3 class="fs-7 fw-semibold pt-6">
                                    Dea Meilani
                                </h3>
                                <p class="mb-7 pb-2 text-dark">
                                    21552011273
                                </p>
                                <div class="d-sm-flex align-items-center justify-content-center gap-3 mb-4">
                                    <a href="https://github.com/deaaamln" target="_blank"
                                        class="btn btn-warning d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6"
                                        type="button"><i class="ti ti-brand-github"></i> Go Github</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="colka col-lg-6">
                        <h3 class="pb-5">Fitur Unggulan</h3>
                        <div class="hme">
                            <img src="../assets/images/icon/home.svg" alt="">
                            <h5>Dasboard</h5>
                        </div>
                        <div class="khme">
                        <p>Mangement & monitoring App Todo List</p>
                        </div>
                        <div class="it">
                            <img src="../assets/images/icon/lst.png" alt="">
                            <h5>Intuitif Todo</h5>
                        </div>
                        <div class="kit">
                            <p>Melakukan Pencatatan kerja lebih mudah dan Menyenangkan</p>
                        </div>
                        <div class="mc">
                            <img src="../assets/images/icon/ctg.png" alt="">
                            <h5>Mostly Category</h5>
                        </div>
                        <div class="kmc">
                            <p>Dapat Menambahkan Kategori Sesuai dengan Keperluan</p>
                        </div>
                        <div class="ts">
                            <img src="../assets/images/icon/cldr.png" alt="">
                            <h5>Todo Schedule</h5>
                        </div>
                        <div class="kts">
                        <p>Jadwalkan Catatanmu Disini Agar Teratur</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@include('layouts.footer')
<div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
    aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header p-4">
        <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" alt="modernize-img" class="img-fluid"
            width="150">
    </div>
    <div class="offcanvas-body p-4">
        <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item mt-3">
                <a class="nav-link fs-3 text-dark" href="#home">Beranda</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link fs-3 text-dark" href="#about">Fitur & Tentang Saya</a>
            </li>
        </ul>
        <form class="d-flex mt-3" role="search">
            <a href="../main/authentication-login.html" class="btn btn-warning w-100 py-2">Login</a>
        </form>
    </div>
</div>
