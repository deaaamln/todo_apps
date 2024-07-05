@extends('dashboard.app')
@section('title', 'Catatan')
@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between my-4 align-items-center">
                    <button class="btn btn-warning mb-2" type="button" data-bs-toggle="modal" data-bs-target="#addTodoModal">
                        Tambah Catatan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addTodoModal" tabindex="-1" aria-labelledby="addTodoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTodoModalLabel">Tambah Catatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('storeTodo') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Kategori</label>
                                            <select class="form-select" name="todo_category_id" id="todo_category_id">
                                                <option selected>Select category</option>
                                                @foreach ($categories as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="description" name="description" required>
                                        </div>
                                        <button type="submit" class="btn btn-warning">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="d-flex gap-1" method="GET" action="{{ route('todos') }}">
                        <div class="form-group">
                            <label for="title" class="d-none">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Search by title" value="{{ request('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="d-none">Category</label>
                            <select name="todo_category_id" id="todo_category_id" class="form-control">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('todo_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Cari</button>
                    </form>
                </div>
                <div class="table-responsive border rounded-4">
                    <table class="table text-nowrap customize-table mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">No</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Judul</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Kategori</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Deskripsi</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Tanggal</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todos as $index => $todo)
                                <tr>
                                    <td>
                                        <span class="fw-normal">{{ $index+1}}</span>
                                    </td>
                                    <td>
                                        <span class="fw-normal">{{ $todo->title }}</span>
                                    </td>
                                    <td>
                                        <p class="mb-0 fw-normal fs-4">{{ $todo->todo_category->name }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 fw-normal fs-4">{{ $todo->description }}</p>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success">{{ $todo->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editTodoModal{{ $todo->id }}">
                                                <i class="ti ti-edit"></i>
                                            </button>
                                            <form method="POST" action="{{ route('deleteTodo', $todo->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this todo?');">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editTodoModal{{ $todo->id }}" tabindex="-1" aria-labelledby="editTodoModalLabel{{ $todo->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editTodoModalLabel{{ $todo->id }}">Edit todo</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('updateTodo', $todo->id) }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="category" class="form-label">Category</label>
                                                                <select class="form-select" name="todo_category_id" id="todo_category_id">
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}" {{ $todo->todo_category_id == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Title</label>
                                                                <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Description</label>
                                                                <input type="text" class="form-control" id="description" name="description" value="{{ $todo->description }}" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-warning">Update todo</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>There are no todo.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $todos->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection