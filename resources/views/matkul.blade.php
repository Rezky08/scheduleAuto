@include('admin.head')
@include('admin.sidebar')
@include('admin.modal.modal_matkul')
@include('admin.validasi')
@include('admin.footer_scripts')
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
        <div id="content" class="p-4 p-md-5">
            <!-- Navbar -->
            @yield('navbar')

            <!-- validasi -->
            @yield('validasi')

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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalimatkul">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered">
                    <tr>
                        <th>Kode Matkul</th>
                        <th>Nama Matkul</th>
                        <th>SKS</th>
                        <th>Status</th>
                        <th>Lab</th>
                        <th>Prodi</th>
                        <th>Opsi</th>
                    </tr>
                    @foreach ($mata_kuliah as $matkul)
                    <tr id="{{$matkul['id']}}">
                        <td id="kode_matkul"> {{$matkul['kode_matkul'] }}</td>
                        <td id="nama_matkul"> {{$matkul['nama_matkul'] }}</td>
                        <td id="sks_matkul"> {{$matkul['sks_matkul'] }}</td>
                        <td id="status_matkul"> {{$matkul['status_matkul'] }}</td>
                        <td id="lab_matkul"> {{$matkul['lab_matkul'] }}</td>
                        <td id="kode_prodi"> {{$matkul['kode_prodi'] }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#modalumatkul" data-kode-matkul="{{$matkul['kode_matkul']}}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldmatkul"
                                data-kode-matkul="{{$matkul['kode_matkul']}}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>



        </div>
        @yield('MODAL')
    </div>
    @yield('footer_scripts')
</body>

</html>
