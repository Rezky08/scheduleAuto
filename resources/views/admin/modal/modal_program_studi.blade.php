@section('MIPRODI')
@component('components.program_studi_modal_form')
@slot('modal_id')
modaliprodi
@endslot

@slot('modal_title')
Tambah Program Studi
@endslot

@slot('action')
/program_studi/add
@endslot
@endcomponent
@endsection

@section('MUPRODI')
@component('components.program_studi_modal_form')
@slot('modal_id')
modaluprodi
@endslot

@slot('modal_title')
Ubah Program Studi
@endslot

@slot('action')
/program_studi/update/
@endslot
@endcomponent
@endsection

@section('MDPRODI')
@component('components.modal_form')
@slot('modal_id')
modaldprodi
@endslot

@slot('modal_title')
<h5 class="text-white">Hapus Program Studi</h5>
@endslot

@slot('action')
/program_studi/delete/
@endslot

@slot('modal_header_class')
bg-danger
@endslot

@slot('form_fields')
<strong id="modal-message">Apakah anda ingin menghapus Program Studi ini ?</strong>
@endslot

@slot('modal_footer')
<button type="submit" class="btn btn-warning">Ya</button>
<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
    Tidak
</button>
@endslot

@endcomponent
@endsection

@section('MODALJSPRODI')
<script>
    // load mata kuliah table
    loadProdi(program_studi);

    // Button update prodi
    $('button[data-target="#modaluprodi"]').on('click', function () {
        row_parent = $(this).parents('tr');
        id_prodi = $(row_parent).attr('id');
        program_studi_item = program_studi.find(function (item,index) {
            if(item.id==id_prodi){
                return item;
            }
        });

        form = $("#modaluprodi #formmodal");
        $(form).find("[name='kode_prodi']").val(program_studi_item.kode_prodi);
        $(form).find("[name='nama_prodi']").val(program_studi_item.nama_prodi);
        act = '/prodi/update/';
        act = act+id_prodi;
        $(form).attr('action',act);
    });
    // Button delete prodi
    $("button[data-target='#modaldprodi']").on('click', function () {
        row_parent = $(this).parents('tr');
        id_prodi = $(row_parent).attr('id');
        prodi_item = program_studi.filter(function (item) {
            if (item.id == id_prodi) {
                return item;
            }
         })[0];
        message = "Apakah anda ingin menghapus Program Studi "+prodi_item.nama_prodi+" ("+prodi_item.kode_prodi+") ?";
        $("#modaldprodi").find('#modal-message').text(message);
        // act = $("#modaldprodi").find("form").attr('action');
        act = '/prodi/delete/';
        act = act+id_prodi;
        $("#modaldprodi").find("form").attr('action',act);
    });
</script>

@endsection

@section('MODAL')
<!-- MODAL INPUT -->
@yield('MIPRODI')
<!-- MODAL UPDATE -->
@yield('MUPRODI')
<!-- MODAL DELETE -->
@yield('MDPRODI')
<!-- MODAL JS -->
@yield('MODALJSPRODI')
@endsection
