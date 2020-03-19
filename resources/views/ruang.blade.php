@include('admin.head')
@include('admin.sidebar')
@include('admin.modal_scripts')
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

        <div id="content" class="p-4 p-md-5 pt-5">
            <br />

            <!-- validasi -->
            @yield('validasi')

            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-header">
                    <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Ruang : &nbsp;
                        <input class="form-control border border-secondary" type="text" name="cari"
                            placeholder="Cari Pegawai .." value="">
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                    </form>
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Ruang
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaliruang">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            <table class="table table-bordered">
                <tr>
                    <th>Nama Ruang</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                </tr>
                @foreach ($ruang as $j)
                <tr id="{{$j['id']}}">
                    <td id="nama_ruang"> {{$j['nama_ruang'] }}</td>
                    <td id="keterangan"> {{$j['nama_keterangan'] }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaluruang"
                            data-id="{{$j['id']}}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldruang"
                            data-id="{{$j['id']}}">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
            <br />
        </div>
        @yield('MODAL')
    </div>
    @yield('footer_scripts')
</body>

</html>
