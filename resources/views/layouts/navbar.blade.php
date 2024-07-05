<header class="header">
    <nav class="navbar navbar-expand-lg py-0">
        <div class="container">
            <a class="navbar-brand me-0 py-0" href="{{ route('index') }}">
                <!-- <img src="../assets/images/logos/dark-logo.svg" alt="img-fluid"> -->
                <p>MyTodoList</p>
            </a>
            <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#feature">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#about">About</a>
                    </li>
                    <li class="nav-item ms-2">
                        @if (Auth::check())
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        @if ($profile->photo)
                                            <img src="{{ $profile->photo }}" class="rounded-circle" width="35"
                                                height="35" alt="" />
                                        @else
                                            <img src="images/user-1.jpg" class="rounded-circle" width="35"
                                                height="35" alt="" />
                                        @endif
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop1">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="py-3 px-7 pb-0">
                                        <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                    </div>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        <img src="images/user-1.jpg" class="rounded-circle" width="80"
                                            height="80" alt="" />
                                        <div class="ms-3">
                                            <h5 class="mb-1 fs-3">{{ $user->name }}</h5>
                                            <span class="mb-1 d-block">{{ $profile->gender }}</span>
                                            <p class="mb-0 d-flex align-items-center gap-2">
                                                <i class="ti ti-mail fs-4"></i> {{ $user->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        <a href="{{ route('settings') }}"
                                            class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">Dashboard</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-grid py-4 px-7 pt-8">
                                        <a href="{{ route('logout') }}" class="btn btn-outline-primary">Log Out</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a class="btn btn-warning fs-3 rounded btn-hover-shadow px-3 py-2"
                                href="{{ route('login') }}">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
