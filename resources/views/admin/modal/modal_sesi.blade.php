@section('MISESI')
@component('components.sesi_modal_form')
@slot('modal_id')
modalisesi
@endslot

@slot('modal_title')
Tambah Sesi
@endslot

@slot('action')
/sesi/add
@endslot
@endcomponent
@endsection

@section('MUSESI')
@component('components.sesi_modal_form')
@slot('modal_id')
modalusesi
@endslot

@slot('modal_title')
Ubah Sesi
@endslot

@slot('action')
/sesi/update/
@endslot
@endcomponent
@endsection

@section('MDSESI')
@component('components.modal_form')
@slot('modal_id')
modaldsesi
@endslot

@slot('modal_title')
<h5 class="text-white">Hapus sesi</h5>
@endslot

@slot('action')
/sesi/delete/
@endslot

@slot('modal_header_class')
bg-danger
@endslot

@slot('form_fields')
<strong id="modal-message">Apakah anda ingin menghapus sesi ini ?</strong>
@endslot

@slot('modal_footer')
<button type="submit" class="btn btn-warning">Ya</button>
<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
    Tidak
</button>
@endslot

@endcomponent
@endsection

@section('MODALJSSESI')
<script>
    // load sesi table
    loadSesi(sesi);

    // Button update sesi
    $('button[data-target="#modalusesi"]').on('click', function () {
        row_parent = $(this).parents('tr');
        id_sesi = $(row_parent).attr('id');
        sesi_item = sesi.find(function (item,index) {
            if(item.id==id_sesi){
                return item;
            }
        });

        form = $("#modalusesi #formmodal");
        $(form).find("[name='sesi_mulai']").val(sesi_item.sesi_mulai);
        $(form).find("[name='sesi_selesai']").val(sesi_item.sesi_selesai);
        act = '/sesi/update/';
        act = act+id_sesi;
        $(form).attr('action',act);
    });
    // Button delete sesi
    $("button[data-target='#modaldsesi']").on('click', function () {
        row_parent = $(this).parents('tr');
        id_sesi = $(row_parent).attr('id');
        sesi_item = sesi.filter(function (item) {
            if (item.id == id_sesi) {
                return item;
            }
         })[0];
        message = "Apakah anda ingin menghapus sesi ("+sesi_item.sesi_mulai+"-"+sesi_item.sesi_selesai+") ?";
        $("#modaldsesi").find('#modal-message').text(message);
        // act = $("#modaldsesi").find("form").attr('action');
        act = '/sesi/delete/';
        act = act+id_sesi;
        $("#modaldsesi").find("form").attr('action',act);
    });
</script>
@endsection

@section('MODAL')
<!-- MODAL INPUT -->
@yield('MISESI')
<!-- MODAL UPDATE -->
@yield('MUSESI')
<!-- MODAL DELETE -->
@yield('MDSESI')
<!-- MODAL JS -->
@yield('MODALJSSESI')
@endsection
