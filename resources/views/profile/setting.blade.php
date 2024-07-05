@extends('dashboard.app')
@section('title', 'Catatan Terjadwal')
@section('content')

    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
        <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button
            class="nav-link custom-tab-button position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3 active"
            id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button"
            role="tab" aria-controls="pills-account" aria-selected="true">
            <i class=""></i>
            <span class="d-none d-md-block">Account</span>
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button
            class="nav-link custom-tab-button position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
            id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password" type="button"
            role="tab" aria-controls="pills-password" aria-selected="false" tabindex="-1">
            <i class=""></i>
            <span class="d-none d-md-block">Password</span>
        </button>
    </li>
</ul>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-account" role="tabpanel"
                        aria-labelledby="pills-account-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="card w-100 border position-relative overflow-hidden">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Change Profile</h4>
                                        <p class="card-subtitle mb-4">Ganti photo profile kamu disini.</p>
                                        <div class="text-center">
                                            <form action="{{ route('updatePhoto') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @if ($profile && $profile->photo)
                                                    <img src="{{ asset($profile->photo) }}" alt="modernize-img"
                                                        class="rounded-circle object-fit-cover" width="120" height="120">
                                                @else
                                                    <img src="path/to/default/photo.jpg" alt="default-img"
                                                        class="rounded-circle object-fit-cover" width="120" height="120">
                                                @endif
                                                <div class="align-items-center my-4 gap-6">
                                                    <input class="form-control mt-4 @error('photo') is-invalid @enderror"
                                                        type="file" id="photo" name="photo">
                                                    @error('photo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <p class="mb-4">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                                <button class="btn btn-warning" type="submit">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="card w-100 border position-relative overflow-hidden">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Change Information</h4>
                                        <p class="card-subtitle mb-4">Ubah profile kamu disini</p>
                                        <form action="{{ route('updateProfile') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    name="name" value="{{ old('name', $user->name) }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control disabled" id="email"
                                                    placeholder="Mathew Anderson" value="{{ $user->email }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select @error('gender') is-invalid @enderror"
                                                    aria-label="Default select example" name="gender">
                                                    <option value="" disabled selected>{{ $profile ? $profile->gender : 'Pilih gender' }}</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                                                <input type="date"
                                                    class="form-control @error('date_of_birth') is-invalid @enderror"
                                                    value="{{ $profile ? \Carbon\Carbon::parse($profile->date_of_birth)->format('Y-m-d') : '' }}"
                                                    name="date_of_birth" id="date_of_birth">
                                                @error('date_of_birth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button class="btn btn-warning" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab"
                        tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 d-flex align-items-stretch">
                                <div class="card w-100 border position-relative overflow-hidden">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Change Password</h4>
                                        <p class="card-subtitle mb-4">Untuk ubah password anda disini</p>
                                        <form method="POST" action="{{ route('updatePassword') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">Current Password</label>
                                                <input type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    id="current_password" name="current_password">
                                                @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="new_password" class="form-label">New Password</label>
                                                <input type="password"
                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                    id="new_password" name="new_password">
                                                @error('new_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="new_password_confirmation" class="form-label">Confirm
                                                    Password</label>
                                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                            </div>
                                            <button class="btn btn-warning" type="submit">Simpan perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection