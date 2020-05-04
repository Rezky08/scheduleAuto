@include('admin.head')
@include('admin.sidebar')
@include('admin.modal.modal_sesi')
@include('admin.validasi')
@include('admin.footer_scripts')
@include('admin.bladeJs.sesiJs')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('header')
    @yield('sesiJsHeader')
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <!-- Sidebar -->
        @yield('sidebar')
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <!-- Navbar -->
            @yield('navbar')

            <!-- validasi -->
            @yield('validasi')

            <!-- Button trigger modal -->
            <div class="card">
                <div class="card-header">
                    @component('components.searchbox')
                    @slot('action')
                    #
                    @endslot
                    @slot('label')
                    Cari Data Sesi :
                    @endslot
                    @slot('placeholder')
                    Sesi
                    @endslot
                    @slot('endpoint_target')
                    sesi/search
                    @endslot
                    @slot('callback')
                    loadSesi
                    @endslot
                    @endcomponent
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Sesi
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalisesi">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            @component('components.scrollable_table',
            [
            'table_header'=>['No','Sesi Mulai','Sesi Selesai'],
            'modal_target'=>[
            'update'=>'#modalusesi',
            'delete'=>'modaldsesi'
            ]
            ])
            @endcomponent
        </div>
    </div>
    @yield('sesiJsFooter')
    @yield('MODAL')
    @yield('footer_scripts')
    @yield('search_box_script')
</body>

</html>
