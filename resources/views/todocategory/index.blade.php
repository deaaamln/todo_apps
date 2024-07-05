@extends('dashboard.app')
@section('title', 'Kategori')
@section('content')

    <div class="align-items-stretch">
        <div class="card w-100">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body p-4">
                <form method="POST" action="{{ route('storeCategory') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">Kategori</label>
                        <input type="text" name="name" id="name " placeholder="Tambah Kategori" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>

                <div class="row mt-4">
                    @forelse ($categories as $category)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body p-4 d-flex align-items-center gap-3">
                                    <img src="https://picsum.photos/id/{{ $category->id }}/200/300.jpg" alt="modernize-img"
                                        class="rounded-circle" width="40" height="40">
                                    <h4 class="card-title mb-1">{{ $category->name }}</h4>
                                    <button class="btn btn-primary py-1 px-2 ms-auto" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#editCategoryTodo{{ $category->id }}"
                                        aria-controls="editCategoryTodo"><i class="ti ti-edit"></i></button>
                                    <form method="POST" action="{{ route('deleteCategory', $category->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger py-1 px-2 ms-auto"
                                            onclick="return confirm('Are you sure you want to delete this todo?');"><i
                                                class="ti ti-trash"></i></button>
                                    </form>
                                    <div class="offcanvas offcanvas-end" tabindex="-1"
                                        id="editCategoryTodo{{ $category->id }}" aria-labelledby="editCategoryTodoLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="editCategoryTodoLabel">Edit Kategori Kerja
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <form method="POST" action="{{ route('updateCategory', $category->id) }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Kategori</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" value="{{ $category->name }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-warning">Perbarui Kategori</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <h6 class="text-muted">Kategori Tidak Ditemukan</h6>
                        </div>
                    @endforelse
                    {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
