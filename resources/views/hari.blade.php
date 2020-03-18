@include('admin.head')
@include('admin.modal_scripts')
@include('admin.sidebar')
@include('admin.validasi')
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

            <!-- validasi -->
            @yield('validasi')

            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-header">
                    <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Hari : &nbsp;
                        <input class="form-control border border-secondary" type="text" name="cari" value="">
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                    </form>
                </div>

                <div class="card-body">
                    <blockquote class="blockquote mb-0">Data Hari
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalihari">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <!-- Button trigger modal -->

            <br />
            <table class="table table-bordered">
                <tr>
                    <th>Hari</th>
                    <th>Opsi</th>
                </tr>
                @foreach ($hari ?? '' as $j)
                <tr>
                    <td> {{$j['nama_hari'] }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaluhari">
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
        @yield('MIHARI')

        {{-- modal edit --}}
        @yield('MUHARI')

    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
