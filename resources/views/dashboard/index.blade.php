@extends('dashboard.app')
@section('title', 'Dashboard')
@section('content')
<!--  Body Wrapper -->
<div class="container-fluid">
    <div class="card">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex  align-items-center">
                            <div>
                                <h4 class="card-title fs-7">{{ $totalTodos }}</h4>
                                <p class="card-subtitle text-black">Catatan Saya</p>
                            </div>
                            <div class="ms-auto">
                                <span>
                                    <img src="images/catatan4.png">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h4 class="card-title fs-7">{{ $totalCategories }}</h4>
                                <p class="card-subtitle text-black">Catatan Kategori</p>
                            </div>
                            <div class="ms-auto">
                                <span>
                                    <img src="images/dashboard4.png">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex  align-items-center">
                            <div>
                                <h4 class="card-title fs-7">{{ $totalTodoListsInProgress }}</h4>
                                <p class="card-subtitle text-black">Catatan Proses</p>
                            </div>
                            <div class="ms-auto">
                                <span>
                                    <img src="images/proses4.png">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex  align-items-center">
                            <div>
                                <h4 class="card-title fs-7">{{ $totalTodoListsCompleted }}</h4>
                                <p class="card-subtitle text-black">Catatan Selesai</p>
                            </div>
                            <div class="ms-auto">
                                <span>
                                    <img src="images/ceklis4.png">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="mb-4">
                                <h4 class="card-title fw-semibold">Catatan terbaru</h4>
                                <p class="card-subtitle">Kamu baru saja membuat catatan berikut</p>
                            </div>
                            <ul class="timeline-widget mb-0 position-relative mb-n5">
                                @foreach ($latestTodos as $todo)
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            {{ \Carbon\Carbon::parse($todo->created_at)->diffForHumans() }}</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">
                                            {{ Str::limit($todo->title, 14, '...') }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> -->
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                            <div class="mb-3 mb-sm-0">
                                <h4 class="card-title fw-semibold">Catatan Terjadwal</h4>
                                <p class="card-subtitle">Baru saja dijadwalkan</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle text-nowrap mb-0">
                                <thead>
                                    <tr class="text-muted fw-semibold">
                                        <th scope="col" class="ps-0">Catatan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">User</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top">
                                    @foreach ($latestTodoLists as $list)
                                    <tr>
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 pe-1">
                                                    <img src="https://picsum.photos/id/{{ 10 + $list->id }}/200/200.jpg" class="rounded-circle" width="40" height="40" alt="modernize-img">
                                                </div>
                                                <div>
                                                    <h6 class="fw-semibold mb-1">{{ $list->todo->title }}</h6>
                                                    <p class="fs-2 mb-0 text-muted">
                                                        {{ $list->todo->todo_category->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($list->status == 'dibuat')
                                            <span class="badge bg-danger  fs-2 py-1 px-2 lh-sm  mt-3">Dibuat</span>
                                            @elseif ($list->status == 'proses')
                                            <span class="badge bg-warning  fs-2 py-1 px-2 lh-sm  mt-3">Proses</span>
                                            @elseif ($list->status == 'selesai')
                                            <span class="badge bg-success  fs-2 py-1 px-2 lh-sm  mt-3">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge fw-semibold py-1 w-85 text-primary">{{ \Carbon\Carbon::parse($list->date_time)->format('D, d M') }}</span>
                                        </td>
                                        <td>
                                            <p class="fs-3 text-dark mb-0">{{ $list->user->email }}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection