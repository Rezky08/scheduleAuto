{{-- @extends('admin._partials.head') --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>KKP</title>
        {{-- @yield('header') --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
  <body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
	                </button>
                </div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">Flash</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="#"><span class="fa fa-user mr-3"></span> About</a>
	          </li>
	          <li>
              <a href="#"><span class="fa fa-briefcase mr-3"></span> Portfolio</a>
	          </li>
	        </ul>

	        <div class="mb-5">
						<h3 class="h6 mb-3">Subscribe for newsletter</h3>
						<form action="#" class="subscribe-form">
	            <div class="form-group d-flex">
	            	<div class="icon"><span class="icon-paper-plane"></span></div>
	              <input type="text" class="form-control" placeholder="Enter Email Address">
	            </div>
	          </form>
					</div>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
                    <h3>Data Pegawai</h3>
                            <p>Cari Data Pegawai :</p>
                            <form action="/pegawai/cari" method="GET" class="form-inline">
                                <input class="form-control" type="text" name="cari" placeholder="Cari Pegawai .." value="">
                                <input class="btn btn-primary ml-3" type="submit" value="CARI">

                            </form>
                        <!-- Button trigger modal -->
                        <br/>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                           Tambah
                        </button>
                        <br/>
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
                            <br/>
        </div>

        {{-- Modal input  --}}
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

                {{-- modal edit --}}

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
        </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
