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
            <h4 class="page-title">Pengguna</h4>
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
                    <a href="/admin/pengguna">Pengguna</a>
                </li>
                <li class="separator">
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li class="nav-item">
                    <a href="">Tambah pengguna</a>
                </li>
            </ul>

        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card-title"> Tambah Pengguna</div>
                    </div>
                    <div class="col">
                        {{-- <a class="btn btn-primary text-white float-right"
                            href="{{route('pegawai.create')}}">Tambah
                            Pengguna</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('pegawai.store')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                    <label for="" class="mb-2">Nama Lengkap :</label>
                <input type="text" name="name" placeholder="Nama Lengkap" class="form-control"><br>
                <label for="" class="mb-2">Email :</label>
                <input type="text" name="email" placeholder="Email" class="form-control"><br>
                <label for="" class="mb-2">Password :</label>
                <p><input type="Password" id="pw1" style="height: 50px; width: 100%;" class="form-control" name="password"
                    placeholder="Masukan Password"></p><br>
                <label for="" class="mb-2">Konfimasi Password :</label>
                <input type="Password" id="pw2" style="height: 50px; width: 100%;" class="form-control" name="password"
                placeholder="Konfirmasi Password">
                {{-- <input type="text" placeholder="Pin" class="form-control"><br> --}}
                <button class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function () {
            document.getElementById("pw1").onchange = validatePassword;
            document.getElementById("pw2").onchange = validatePassword;
        }
        function validatePassword(){
            var pass2=document.getElementById("pw2").value;
            var pass1=document.getElementById("pw1").value;
            if(pass1!=pass2)
                document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
            else
                document.getElementById("pw2").setCustomValidity('');
        }
    </script>

    {{-- <script type="text/javascript">
        window.onload = function () {
            document.getElementById("pw1").onchange = validatePassword;
            document.getElementById("pw2").onchange = validatePassword;
        }
        function validatePassword(){
            var pass2=document.getElementById("pw2").value;
            var pass1=document.getElementById("pw1").value;
            if(pass1!=pass2)
                document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
            else
                document.getElementById("pw2").setCustomValidity('');
        }
    </script> --}}

    {{-- <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg border-0" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="modalSayaLabel">Tambah Data pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="label">Nama Lengkap</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Masukan nama lengkap"
                                autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="label">Alamat Email</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Masukan alamat email" autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Masukan password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" autocomplete="off"
                                class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
