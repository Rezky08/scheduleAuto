@section('MIRUANG')
@component('components.ruang_modal_form')
@slot('modal_id')
modaliruang
@endslot

@slot('modal_title')
Tambah ruang
@endslot

@slot('action')
/ruang/add
@endslot
@endcomponent
@endsection

@section('MURUANG')
@component('components.ruang_modal_form')
@slot('modal_id')
modaluruang
@endslot

@slot('modal_title')
Ubah Mata Kuliah
@endslot

@slot('action')
/ruang/update/
@endslot
@endcomponent
@endsection

@section('MDRUANG')
@component('components.modal_form')
@slot('modal_id')
modaldruang
@endslot

@slot('modal_title')
<h5 class="text-white">Hapus ruang</h5>
@endslot

@slot('action')
/ruang/delete/
@endslot

@slot('modal_header_class')
bg-danger
@endslot

@slot('form_fields')
<strong id="modal-message">Apakah anda ingin menghapus ruang ini ?</strong>
@endslot

@slot('modal_footer')
<button type="submit" class="btn btn-warning">Ya</button>
<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
    Tidak
</button>
@endslot

@endcomponent
@endsection

@section('MODALJSRUANG')
<script>
    // load ruang table
    loadRuang(ruang);

    // Button update ruang
    $('button[data-target="#modaluruang"]').on('click', function () {
        row_parent = $(this).parents('tr');
        id_ruang = $(row_parent).attr('id');
        ruang_item = ruang.find(function (item,index) {
            if(item.id==id_ruang){
                return item;
            }
        });

        form = $("#modaluruang #formmodal");
        $(form).find("[name='nama_ruang']").val(ruang_item.nama_ruang);
        $(form).find("[name='keterangan']").val(ruang_item.keterangan);
        act = '/ruang/update/';
        act = act+id_ruang;
        $(form).attr('action',act);
    });
    // Button delete ruang
    $("button[data-target='#modaldruang']").on('click', function () {
        row_parent = $(this).parents('tr');
        id_ruang = $(row_parent).attr('id');
        ruang_item = ruang.filter(function (item) {
            if (item.id == id_ruang) {
                return item;
            }
         })[0];
        message = "Apakah anda ingin menghapus Ruang"+ruang_item.nama_ruang+" ("+ruang_item.id+") ?";
        $("#modaldruang").find('#modal-message').text(message);
        // act = $("#modaldruang").find("form").attr('action');
        act = '/ruang/delete/';
        act = act+id_ruang;
        $("#modaldruang").find("form").attr('action',act);
    });
</script>
@endsection

@section('MODAL')
<!-- MODAL INPUT -->
@yield('MIRUANG')
<!-- MODAL UPDATE -->
@yield('MURUANG')
<!-- MODAL DELETE -->
@yield('MDRUANG')
<!-- MODAL JS -->
@yield('MODALJSRUANG')
@endsection
