@include('admin.head')
@include('admin.sidebar')
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

            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-header">
                    <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Prodi : &nbsp;
                        <input class="form-control border border-secondary" type="text" name="cari" value="">
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                    </form>
                </div>
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

        {{-- modal input --}}
        @yield('MIPRODI')

        {{-- modal edit --}}
        @yield('MUPRODI')
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
