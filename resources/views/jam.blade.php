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
                    <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Sesi : &nbsp;
                        <input class="form-control border border-secondary" type="text" name="cari" value="">
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                    </form>
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Sesi
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalijam">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered">
                    <tr>
                        <th>Sesi Mulai</th>
                        <th>Sesi Selesai</th>
                        <th>Opsi</th>
                    </tr>
                    @foreach ($jam as $j)
                    <tr id="{{$j['id']}}">
                        <td id="jam_mulai"> {{$j['jam_mulai'] }}</td>
                        <td id="jam_selesai"> {{$j['jam_selesai'] }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalujam"
                                data-id="{{$j['id']}}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldjam"
                                data-id="{{$j['id']}}">
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
