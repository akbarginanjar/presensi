@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#pengguna').DataTable();
        });
    </script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Riwayat</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="/admin/dashboard">
                        <i class="fa-solid fa-house-chimney"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li class="nav-item">
                    <a href="/admin/riwayat">Riwayat</a>
                </li>
                <li class="separator">
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li class="nav-item">
                    <a href="">Data Riwayat</a>
                </li>
            </ul>

        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card-title"> Data Riwayat</div>
                    </div>
                    <div class="col">
                        {{-- <a class="btn btn-primary text-white float-right" data-toggle="modal" data-target="#tambah"
                            href="#">Tambah
                            Pengguna</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table responsive-3" id="pengguna">
                        <thead>
                            <tr>
                                <th class="column-primary" data-header="User"><span>No</span></th>
                                <th>Nama Lengkap</th>
                                <th>Email / Username</th>
                                <th>Jadwal Kerja </th>
                                <th> keterangan </th>
                                <th> Tanggal Masuk </th>
                                <th> Jam Masuk</th>
                                <th> Jam Pulang</th>
                                <th>Poto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($riwayat as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->user->email}}</td>
                                    <td>{{$item->jadwal->jadwal}}</td>
                                    <td>{{$item->keterangan->keterangan}}</td>
                                    <td>{{$item->jadwal->updated_at}}</td>
                                    <td>{{$item->jadwal->jam_masuk}}</td>
                                    <td>{{$item->jadwal->jam_pulang}}</td>
                                    <td>
                                        <img src="{{asset('images/riwayat/'. $item->poto) }}" width="100%">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
