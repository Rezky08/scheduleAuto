@section('sidebar')
</nav>
<nav id="sidebar" class="active">
    <h1><a href="index.html" class="logo">KKP</a></h1>
    <ul class="list-unstyled components mb-5">
        <li class="active">
            <a href=""> <i class="fa fa-home"></i> Home</a>
        </li>
        <li>
            <a href="/ruang"> <i class="fa fa-chevron-right"></i> Ruang</a>
        </li>
        <li>
            <a href="/sesi"> <i class="fa fa-chevron-right"></i> Sesi</a>
        </li>
        <li>
            <a href="/hari"> <i class="fa fa-chevron-right"></i> Hari</a>
        </li>

        <li>
            <a href="/matkul"> <i class="fa fa-chevron-right"></i> Mata kuliah</a>
        </li>
        <li>
            <a href="/program_studi"> <i class="fa fa-chevron-right"></i> Program Studi</a>
        </li>
        <li>
            <a href="/kelompok_dosen/detail"> <i class="fa fa-chevron-right"></i> Kelompok Dosen</a>
        </li>
    </ul>


    {{-- <div class="footer">
        <p>
            Copyright &copy;<script>
                document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by
            <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
        </p>
    </div> --}}
</nav>
@endsection
@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">


                <li class="nav-item dropdown">

                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item" href="#">Disini</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
@endsection
