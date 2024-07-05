@extends('dashboard.app')
@section('title', 'Catatan Terjadwal')
@section('content')

    <div class="align-items-stretch">
        <div class="card w-100">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body p-4">
                <form method="POST" action="{{ route('storeList') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="todo_id" class="form-label">My Todo</label>
                        <select class="form-select" name="todo_id" id="todo_id">
                            <option selected>Select todo</option>
                            @foreach ($todos as $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option selected>Status</option>
                            <option value="dibuat">Dibuat</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="date_time" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date_time" name="date_time">
                    </div>
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>

                <div class="row mt-4">
                    @forelse ($todolists as $todolist)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body p-4 d-flex align-items-center gap-3">
                                    <img src="https://picsum.photos/id/{{ 10 + $todolist->id }}/300/200.jpg" alt="modernize-img"
                                        class="rounded-circle" width="40" height="40">
                                    <h4 class="card-title mb-1">{{ $todolist->todo->title }}</h4>
                                    <button class="btn btn-warning py-1 px-2 ms-auto" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#editListTodo{{ $todolist->id }}"
                                        aria-controls="editListTodo"><i class="ti ti-edit"></i></button>
                                    <form method="POST" action="{{ route('deleteList', $todolist->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger py-1 px-2 ms-auto"
                                            onclick="return confirm('Are you sure you want to delete this todo?');"><i
                                                class="ti ti-trash"></i></button>
                                    </form>
                                    <div class="offcanvas offcanvas-end" tabindex="-1"
                                        id="editListTodo{{ $todolist->id }}" aria-labelledby="editListTodoLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="editListTodoLabel">Edit Todo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <form method="POST" action="{{ route('updateList', $todolist->id) }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="todo_id" class="form-label">My Todo</label>
                                                    <select class="form-select" name="todo_id" id="todo_id">
                                                        <option value="{{ $todolist->todo->id }}">{{ $todolist->todo->title }}</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" name="status" id="status">
                                                        <option selected>{{ $todolist->status }}</option>
                                                        <option value="dibuat">Dibuat</option>
                                                        <option value="proses">Proses</option>
                                                        <option value="selesai">Selesai</option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="date_time" class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="date_time" name="date_time"
                                                        value="{{ $todolist->date_time }}">
                                                </div>
                                                <button type="submit" class="btn btn-warning">Perbarui Todo</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <h6 class="text-muted">Todo Tidak Ditemukan</h6>
                        </div>
                    @endforelse
                    {!! $todolists->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection