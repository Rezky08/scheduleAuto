@include('admin.head')
@include('admin.sidebar')
@include('admin.modal.modal_ruang')
@include('admin.validasi')
@include('admin.footer_scripts')
@include('admin.bladeJs.ruangJs')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('header')
    @yield('ruangJsHeader')
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
                    Cari Data Ruang :
                    @endslot
                    @slot('placeholder')
                    Ruang
                    @endslot
                    @slot('endpoint_target')
                    ruang/search
                    @endslot
                    @slot('callback')
                    loadRuang
                    @endslot
                    @endcomponent
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
            @component('components.scrollable_table',
            [
            'table_header'=>['No','Nama Ruang','Keterangan'],
            'modal_target'=>[
            'update'=>'#modaluruang',
            'delete'=>'modaldruang'
            ]
            ])
            @endcomponent
        </div>
    </div>
    @yield('ruangJsFooter')
    @yield('MODAL')
    @yield('footer_scripts')
    @yield('search_box_script')
</body>

</html>
