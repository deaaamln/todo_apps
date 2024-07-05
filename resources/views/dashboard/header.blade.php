<header class="topbar">
    <div class="with-vertical">
        <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>
            <div class="d-flex d-lg-none align-items-center justify-content-between">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                         aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    @if (Auth::user()->profile && Auth::user()->profile->photo)
                                        <img src="{{ Auth::user()->profile->photo }}" class="rounded-circle object-fit-cover"
                                            width="35" height="35" alt="" />
                                    @else
                                        <img src="images/user-1.jpg" class="rounded-circle object-fit-cover" width="35"
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
                                    <img src="images/user-1.jpg" class="rounded-circle" width="80" height="80"
                                        alt="" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                        <p class="mb-0 d-flex align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="message-body">
                                    <a href="{{ route('settings') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                            <img src="images/icon-account.svg" alt="" width="24"
                                                height="24" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                            <span class="fs-2 d-block text-body-secondary">Pengaturan Akun</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('lists') }}" class="py-8 px-7 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                            <img src="images/icon-tasks.svg" alt="" width="24"
                                                height="24" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Task</h6>
                                            <span class="fs-2 d-block text-body-secondary">To-do and
                                                Daily Tasks</span>
                                        </div>
                                    </a>
                                </div>
                                <form class="d-grid py-4 px-7 pt-8" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-primary" type="submit">Log Out</button>
                                </form>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        @if (Auth::user()->profile && Auth::user()->profile->photo)
                                            <img src="{{ Auth::user()->profile->photo }}" class="rounded-circle object-fit-cover"
                                                width="35" height="35" alt="" />
                                        @else
                                            <img src="images/user-1.jpg" class="rounded-circle object-fit-cover" width="35"
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
                                        @if (Auth::user()->profile && Auth::user()->profile->photo)
                                            <img src="{{ Auth::user()->profile->photo }}" class="rounded-circle object-fit-cover"
                                                width="80" height="80" alt="" />
                                        @else
                                            <img src="images/user-1.jpg" class="rounded-circle object-fit-cover" width="80"
                                                height="80" alt="" />
                                        @endif
                                        <div class="ms-3">
                                            <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                            <p class="mb-0 d-flex align-items-center gap-2">
                                                <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        <a href="{{ route('settings') }}"
                                            class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="images/icon-account.svg" alt="" width="24"
                                                    height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                <span class="fs-2 d-block text-body-secondary">Pengaturan Akun</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('lists') }}" class="py-8 px-7 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="images/icon-tasks.svg" alt="" width="24"
                                                    height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">Catatan terjadwal</h6>
                                                <span class="fs-2 d-block text-body-secondary">Catatan dan Target
                                                    Harian</span>
                                            </div>
                                        </a>
                                    </div>
                                    <form class="d-grid py-4 px-7 pt-8" action="{{ route('logout') }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-outline-primary" type="submit">Log Out</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>