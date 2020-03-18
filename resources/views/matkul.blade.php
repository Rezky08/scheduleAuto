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
