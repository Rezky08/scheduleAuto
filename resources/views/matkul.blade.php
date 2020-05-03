@include('admin.head')
@include('admin.sidebar')
@include('admin.modal.modal_matkul')
@include('admin.validasi')
@include('admin.footer_scripts')
@include('admin.bladeJs.matkulJs')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('header')
    @yield('matkulJsHeader')
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
                            Cari Data Mata Kuliah :
                        @endslot
                        @slot('placeholder')
                            Mata kuliah
                        @endslot
                        @slot('endpoint_target')
                            matkul/search
                        @endslot
                        @slot('callback')
                            loadMatkul
                        @endslot
                    @endcomponent
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Mata Kuliah
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalimatkul">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            @component('components.scrollable_table',
            [
                'table_header'=>['No','Kode','Nama','Sks','Status','Ruang','Prodi'],
                'modal_target'=>[
                    'update'=>'#modalumatkul',
                    'delete'=>'modaldmatkul'
                    ]
                ])
            @endcomponent
        </div>
    </div>
    @yield('matkulJsFooter')
    @yield('MODAL')
    @yield('footer_scripts')
    @yield('search_box_script')
</body>

</html>
