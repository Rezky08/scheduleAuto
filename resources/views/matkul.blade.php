@include('admin.head')
@include('admin.sidebar')
@include('admin.footer_scripts')
@include('admin.modal_scripts')
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

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dissmisable fade show" role="alert">
                        <strong>{{$error}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                @endforeach
            @endif
            @if (session('success'))
                @foreach (session('success') as $success)
                    <div class="alert alert-success alert-dissmisable fade show" role="alert">
                        <strong>{{$success}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endforeach
            @endif

            <form action="/pegawai/cari" method="GET" class="form-inline my-3">
                <span class="mr-3">Cari Data Mata Kuliah</span>
                <div class="input-group">
                    <input class="form-control" type="text" name="cari" placeholder="Cari Pegawai .." value="">
                    <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-header">
                    <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Mata Kuliah :&nbsp;
                        <input class="form-control border border-secondary" type="text" name="cari" value="">
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                    </form>
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Mata Kuliah
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            <table class="table table-bordered">
                <tr>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>SKS</th>
                    <th>Status</th>
                    <th>Prodi</th>
                    <th>Opsi</th>
                </tr>
                @foreach ($matakuliah as $j)
                <tr>
                    <td> {{$j['kode_matkul'] }}</td>
                    <td> {{$j['nama_matkul'] }}</td>
                    <td> {{$j['sks_matkul'] }}</td>
                    <td> {{$j['status_matkul'] }}</td>
                    <td> {{$j['kode_prodi'] }}</td>
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

        {{-- modal input --}}
        @yield('MIMATKUL')

        {{-- modal edit --}}
        @yield('MUMATKUL')

    </div>

    @yield('footer_scripts')
</body>

</html>
