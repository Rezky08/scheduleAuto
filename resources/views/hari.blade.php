@include('admin.head')
@include('admin.sidebar')
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
            <div class="card">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">Data Hari
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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

        {{-- Modal input  --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/hari/add">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Nama hari</label>
                                <input type="text" name="nama_hari" class="form-control" placeholder="Nama hari">

                                @if($errors->has('nama_hari'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_hari')}}
                                </div>
                                @endif

                            </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal edit --}}

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/hari/add">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Nama hari</label>
                                <input type="text" name="nama_hari" class="form-control" placeholder="Nama hari">

                                @if($errors->has('nama_hari'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_hari')}}
                                </div>
                                @endif

                            </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Edit">
                            </div>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
