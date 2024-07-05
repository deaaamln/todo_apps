<link rel="stylesheet" href="{{asset('fontawesome-free-6.3.0-web/fontawesome-free-6.3.0-web/css/all.min.css')}}">

<aside class="left-sidebar with-vertical">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-center pt-4">
            <a class="navbar-brand" href="{{ route('index') }}">
                <!-- <img src="../assets/images/logos/dark-logo.svg" alt="img-fluid"> -->
                <p class="fs-4 font-extrabold" style="color: #ffae1f;">MyTodoList</p>
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Todo menu</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <img src="images/dashboard3.png">
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('todos') }}" aria-expanded="false">
                        <span>
                            <img src="images/catatan3.png">
                        </span>
                        <span class="hide-menu">Catatan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('categories') }}" aria-expanded="false">
                        <span>
                            <img src="images/kategori3.png">
                        </span>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('lists') }}" aria-expanded="false">
                        <span>
                            <img src="images/jadwal3.png">
                        </span>
                        <span class="hide-menu">Catatan Terjadwal</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">User</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('settings') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-settings-2"></i>
                        </span>
                        <span class="hide-menu">Pengaturan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="fixed-profile p-3 mx-4 mb-2 bg-warning-subtle rounded mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    @if (Auth::user()->profile && Auth::user()->profile->photo)
                    <img src="{{ Auth::user()->profile->photo }}" class="rounded-circle object-fit-cover" width="40" height="40" alt="" />
                    @else
                    <img src="images/user-1.jpg" class="rounded-circle object-fit-cover" width="40" height="40" alt="" />
                    @endif
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-2 fw-semibold">{{ Str::limit(Auth::user()->name, 14, '...') }}</h6>
                    <span class="fs-1">{{ Auth::user()->email }}</span>
                </div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="border-0 bg-transparent text-warning ms-auto" tabindex="0" type="submit" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                        <i class="ti ti-power fs-6"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<style>
    /* CSS for changing the sidebar link color on hover and click */
    .sidebar-item {
        transition: background-color 0.3s;
    }

    .sidebar-item:hover {
        background-color: #fff0c2; /* Orange color on hover */
    }

    .sidebar-item .sidebar-link {
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar-item .sidebar-link:hover {
        background-color: rgba(255, 174, 31, 0.7); /* Slightly transparent orange */
        color: #ffae1f;
    }

    .sidebar-item .sidebar-link:active,
    .sidebar-item .sidebar-link:focus {
        background-color: #ffae1f; /* Solid #ffae1f color */
        color: #ffffff; /* Optional: change text color to white */
    }

    .sidebar-item .sidebar-link:hover span img ,
    .sidebar-item .sidebar-link:active span img,
    .sidebar-item .sidebar-link:focus span img {
        filter: invert(48%) sepia(90%) saturate(1821%) hue-rotate(10deg) brightness(101%) contrast(101%); /* Orange */
    }

    .sidebar-item .sidebar-link:hover span i,
    .sidebar-item .sidebar-link:active span i,
    .sidebar-item .sidebar-link:focus span i {
        filter: invert(48%) sepia(90%) saturate(1821%) hue-rotate(10deg) brightness(101%) contrast(101%); /* Orange */
    }
    
    .sidebar-item .sidebar-link:active span img,
    .sidebar-item .sidebar-link:focus span img {
        filter: brightness(0) invert(1); /* Change to white */
    }

    .sidebar-item .sidebar-link:active span i,
    .sidebar-item .sidebar-link:focus span i {
        filter: brightness(0) invert(1); /* Change to white */
    }

    .sidebar-item .sidebar-link:hover .hide-menu,
    .sidebar-item .sidebar-link:active .hide-menu,
    .sidebar-item .sidebar-link:focus .hide-menu {
        color: #ffae1f;
    }
</style>