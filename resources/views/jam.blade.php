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
            <form action="/pegawai/cari" method="GET" class="form-inline">Cari Data Sesi :
                <input class="form-control border border-secondary" type="text" name="cari"
                    placeholder="Cari Pegawai .." value="">
                <input class="btn btn-primary ml-3" type="submit" value="CARI">
            </form>
            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Sesi
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            <table class="table table-bordered">
                <tr>
                    <th>Sesi Mulai</th>
                    <th>Sesi Selesai</th>
                    <th>Opsi</th>
                </tr>
                @foreach ($jam as $j)
                <tr>
                    <td> {{$j['jam_mulai'] }}</td>
                    <td> {{$j['jam_selesai'] }}</td>
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
        @yield('MIJAM')

        {{-- modal edit --}}
        @yield('MUJAM')


    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
