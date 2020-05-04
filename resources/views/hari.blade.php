@include('admin.head')
@include('admin.sidebar')
@include('admin.modal.modal_hari')
@include('admin.validasi')
@include('admin.footer_scripts')
@include('admin.bladeJs.hariJs')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('header')
    @yield('hariJsHeader')
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
                    Cari Data Hari :
                    @endslot
                    @slot('placeholder')
                    Hari
                    @endslot
                    @slot('endpoint_target')
                    hari/search
                    @endslot
                    @slot('callback')
                    loadHari
                    @endslot
                    @endcomponent
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Hari
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalihari">
                            Tambah+
                        </button>
                    </blockquote>
                </div>
            </div>
            <br />
            @component('components.scrollable_table',
            [
            'table_header'=>['No','Hari'],
            'modal_target'=>[
            'update'=>'#modaluhari',
            'delete'=>'modaldhari'
            ]
            ])
            @endcomponent
        </div>
    </div>
    @yield('hariJsFooter')
    @yield('MODAL')
    @yield('footer_scripts')
    @yield('search_box_script')
</body>

</html>
