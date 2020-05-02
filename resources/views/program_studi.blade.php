@include('admin.head')
@include('admin.sidebar')
@include('admin.modal.modal_program_studi')
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
            @yield('navbar')
            <!-- validasi -->
            @yield('validasi')
            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-header">
                    <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Program Studi : &nbsp;
                        <input class="form-control border border-secondary" type="text" name="cari" value="">
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                    </form>
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Program Studi
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaliprodi">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered">
                    <tr>
                        <th>Kode Prodi</th>
                        <th>Nama Prodi</th>
                        <th>Opsi</th>
                    </tr>
                    @foreach ($program_studi as $prodi)
                    <tr id="{{$prodi['id']}}">
                        <td id="kode_prodi"> {{$prodi['kode_prodi'] }}</td>
                        <td id="nama_prodi"> {{$prodi['nama_prodi'] }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaluprodi"
                                data-kode-prodi="{{$prodi['kode_prodi']}}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldprodi"
                                data-kode-prodi="{{$prodi['kode_prodi']}}">
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
