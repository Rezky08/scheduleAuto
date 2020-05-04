@include('admin.head')
@include('admin.sidebar')
@include('admin.modal.modal_kelompok_dosen')
@include('admin.validasi')
@include('admin.footer_scripts')
@include('admin.bladeJs.keldosJs')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('header')
    @yield('keldosJsHeader')
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
                    @component('components.searchcombo')
                    @slot('action')
                    #
                    @endslot
                    @slot('label')
                    Cari Data Kelompok Dosen :
                    @endslot
                    {{-- @slot('placeholder')
                    Kelompok Dosen
                    @endslot --}}
                    @slot('endpoint_target')
                    kelompok_dosen/search
                    @endslot
                    @slot('callback')
                    loadKeldos
                    @endslot
                    @endcomponent
                </div>
                <div class="card-body">

                    <blockquote class="blockquote mb-0">Data Kelompok Dosen
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalikeldos">
                            Tambah+
                        </button>
                        <div class="form-group">
                            <label>Peminat Id</label>
                            <select name="peminat_id" class="form-control border">
                                <option value="" disabled selected>Pilih Peminat Id</option>
                            </select>

                            @if($errors->has('peminat_id'))
                            <div class="text-danger">
                                {{ $errors->first('peminat_id')}}
                            </div>
                            @endif

                        </div>

                    </blockquote>
                </div>
            </div>
            <br />
            @component('components.scrollable_table',
            [
            'table_header'=>['No','Kelompok dosen id','Kode Matkul','Kelompok','Kapasitas','Kode Dosen'],
            'modal_target'=>[
            'update'=>'#modalukeldos',
            'delete'=>'modaldkeldos'
            ]
            ])
            @endcomponent
        </div>
    </div>
    @yield('keldosJsFooter')
    @yield('MODAL')
    @yield('footer_scripts')
    @yield('search_box_script')
</body>

</html>
