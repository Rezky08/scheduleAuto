@section('sidebar')
<nav id="sidebar" class="active">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
        <h1><a href="index.html" class="logo">KKP</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href=""> Home</a>
            </li>
            <li>
                <a href="/ruang"> Ruang</a>
            </li>
            <li>
                <a href="/jam"> Sesi</a>
            </li>
            <li>
                <a href="/hari"> Hari</a>
            </li>

            <li>
                <a href="/matkul"> Mata kuliah</a>
            </li>
            <li>
                <a href="/program_studi"> Program Studi</a>
            </li>

        </ul>

        {{-- <div class="mb-5">
            <h3 class="h6 mb-3">Subscribe for newsletter</h3>
            <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                    <div class="icon"><span class="icon-paper-plane"></span></div>
                    <input type="text" class="form-control" placeholder="Enter Email Address">
                </div>
            </form>
        </div>

        <div class="footer">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i>
                by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div> --}}

    </div>
</nav>
@endsection
