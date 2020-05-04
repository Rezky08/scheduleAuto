@include('admin.head')
@include('admin.sidebar')
@include('admin.modal.modal_program_studi')
@include('admin.validasi')
@include('admin.footer_scripts')
@include('admin.bladeJs.prodiJs')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('header')
    @yield('prodiJsHeader')
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
                    Cari Data Program Studi :
                    @endslot
                    @slot('placeholder')
                    Program Studi
                    @endslot
                    @slot('endpoint_target')
                    program_studi/search
                    @endslot
                    @slot('callback')
                    loadProdi
                    @endslot
                    @endcomponent
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Program Studi
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaliprodi">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            @component('components.scrollable_table',
            [
            'table_header'=>['No','Kode','Nama'],
            'modal_target'=>[
            'update'=>'#modaluprodi',
            'delete'=>'modaldprodi'
            ]
            ])
            @endcomponent
        </div>
    </div>
    @yield('prodiJsFooter')
    @yield('MODAL')
    @yield('footer_scripts')
    @yield('search_box_script')
</body>

</html>
