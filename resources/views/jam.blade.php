@extends('admin._partials.head')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @yield('header')
    </head>
    <body>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Navbar</a>
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>

                <div class="container">
                            <h3>Data Pegawai</h3>

                            <p>Cari Data Pegawai :</p>
                            <form action="/pegawai/cari" method="GET" class="form-inline">
                                <input class="form-control" type="text" name="cari" placeholder="Cari Pegawai .." value="">
                                <input class="btn btn-primary ml-3" type="submit" value="CARI">

                            </form>
                        <!-- Button trigger modal -->
                        <br/>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                           Tambah Data +
                        </button>
                        <br/>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/jam/add">

                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label>jam_mulai</label>
                                            <input type="time" name="jam_mulai" class="form-control" placeholder="jam_mulai">

                                            @if($errors->has('jam_mulai'))
                                                <div class="text-danger">
                                                    {{ $errors->first('jam_mulai')}}
                                                </div>
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label>jam_selesai</label>
                                            <input type="time" name="jam_selesai" class="form-control" placeholder="jam_selesai">

                                             @if($errors->has('jam_selesai'))
                                                <div class="text-danger">
                                                    {{ $errors->first('jam_selesai')}}
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
                            <br/>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                                            Edit
                                         </button>
                                         <button type="button" class="btn btn-danger" data-toggle="modal">
                                            Hapus
                                         </button>
                                    </td>
                                </tr>
                                @endforeach
                            </table>

                            <br/>
                        <a href="{{URL::to('/matkul')}}"><h1>test </h1> </a>
                            Halaman :  <br/>
                            Jumlah Data :  <br/>
                            Data Per Halaman :  <br/>
                            <br/>

                        </div>


                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/jam/add">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>jam_mulai</label>
                                    <input type="time" name="jam_mulai" class="form-control" placeholder="jam_mulai">

                                    @if($errors->has('jam_mulai'))
                                        <div class="text-danger">
                                            {{ $errors->first('jam_mulai')}}
                                        </div>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label>jam_selesai</label>
                                    <input type="time" name="jam_selesai" class="form-control" placeholder="jam_selesai">

                                     @if($errors->has('jam_selesai'))
                                        <div class="text-danger">
                                            {{ $errors->first('jam_selesai')}}
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



                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
