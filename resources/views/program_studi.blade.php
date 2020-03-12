@include('admin.head')
@include('admin.sidebar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('header')
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <!-- Sidebar -->
        @yield('sidebar')
        <!-- Page Content  -->

        <div id="content" class="p-4 p-md-5 pt-5">
            <br />
            <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Prodi :
                <input class="form-control" type="text" name="cari" placeholder="Cari Pegawai .." value="">
                <input class="btn btn-primary ml-3" type="submit" value="CARI">
            </form>
            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Prodi
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            <table class="table table-bordered">
                <tr>
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Keteranan</th>
                    <th>Opsi</th>
                </tr>
                @foreach ($program_studi as $j)
                <tr>
                    <td> {{$j['kode_prodi'] }}</td>
                    <td> {{$j['nama_prodi'] }}</td>
                    <td> {{$j['keterangan_prodi'] }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal1">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
            <br />
        </div>

        {{-- Modal input  --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/program_studi/add">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Kode prodi</label>
                                <input type="text" name="kode_prodi" class="form-control" placeholder="kode_prodi">

                                @if($errors->has('kode_prodi'))
                                <div class="text-danger">
                                    {{ $errors->first('kode_prodi')}}
                                </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <label>Nama prodi</label>
                                <input type="text" name="nama_prodi" class="form-control" placeholder="nama_prodi">

                                @if($errors->has('nama_prodi'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_prodi')}}
                                </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="nama_prodi" class="form-control" placeholder="nama_prodi">

                                @if($errors->has('nama_prodi'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_prodi')}}
                                </div>
                                @endif

                            </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal edit --}}

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/program_studi/add">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Kode prodi</label>
                                <input type="text" name="kode_prodi" class="form-control" placeholder="kode_prodi">

                                @if($errors->has('kode_prodi'))
                                <div class="text-danger">
                                    {{ $errors->first('kode_prodi')}}
                                </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <label>Nama prodi</label>
                                <input type="text" name="nama_prodi" class="form-control" placeholder="nama_prodi">

                                @if($errors->has('nama_prodi'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_prodi')}}
                                </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="nama_prodi" class="form-control" placeholder="nama_prodi">

                                @if($errors->has('nama_prodi'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_prodi')}}
                                </div>
                                @endif

                            </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Edit">
                            </div>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
