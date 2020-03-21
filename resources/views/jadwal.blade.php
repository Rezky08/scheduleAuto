@include('admin.head')

@include('admin.sidebar')
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
            {{-- @yield('validasi') --}}

            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-header">
                    <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Hari : &nbsp;
                        <input class="form-control border border-secondary" type="text" name="cari" value="">
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                    </form>
                </div>

                <div class="card-body">
                    <blockquote class="blockquote mb-0">Data Proses
                        <button type="button" class="btn btn-primary" data-toggle="modal">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <!-- Button trigger modal -->

            <br />
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Proses</th>
                        <th>Kode Proses</th>
                        <th>Jam Mulai Proses</th>
                        <th>Status Proses</th>
                        <th>Opsi</th>
                    </tr>
                    {{-- @foreach ($hari as $j) --}}
                    <tr>
                        <td>Kode Uhu</td>
                        <td>Nama WOi</td>
                        <td>25:00</td>
                        <td>Gagal Terus</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </table>
            </div>
        </div>
        {{-- @yield('MODAL') --}}
    </div>
    @yield('footer_scripts')
</body>

</html>
