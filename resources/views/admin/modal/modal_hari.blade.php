@section('MIHARI')
@component('admin.component.hari_modal_form')
@slot('modal_id')
modalihari
@endslot

@slot('modal_title')
Tambah Hari
@endslot

@slot('action')
/hari/add
@endslot
@endcomponent
@endsection

@section('MUHARI')
@component('admin.component.hari_modal_form')
@slot('modal_id')
modaluhari
@endslot

@slot('modal_title')
Ubah Mata Kuliah
@endslot

@slot('action')
/hari/update/
@endslot
@endcomponent
@endsection

@section('MDHARI')
@component('admin.component.modal_form')
@slot('modal_id')
modaldhari
@endslot

@slot('modal_title')
<h5 class="text-white">Hapus Hari</h5>
@endslot

@slot('action')
/hari/delete/
@endslot

@slot('modal_header_class')
bg-danger
@endslot

@slot('form_fields')
<strong id="modal-message">Apakah anda ingin menghapus Hari ini ?</strong>
@endslot

@slot('modal_footer')
<button type="submit" class="btn btn-warning">Ya</button>
<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
    Tidak
</button>
@endslot

@endcomponent
@endsection

@section('MODALJSHARI')
<script>
    let hari = @json($hari);

// Button update hari
$('button[data-target="#modaluhari"]').on('click', function () {
    row_parent = $(this).parents('tr');
    id_hari = $(row_parent).attr('id');
    hari_item = hari.find(function (item,index) {
        if(item.id==id_hari){
            return item;
        }
     });

    form = $("#modaluhari #formmodal");
    $(form).find("[name='nama_hari']").val(hari_item.nama_hari);

    act = '/hari/update/';
    act = act+id_hari;
    $(form).attr('action',act);
});
// Button delete hari
$("button[data-target='#modaldhari']").on('click', function () {
    row_parent = $(this).parents('tr');
    id_hari = $(row_parent).attr('id');
    nama_hari = $(row_parent).find("#nama_hari").text()
    message = "Apakah anda ingin menghapus Hari  "+nama_hari+" ("+id_hari+") ?";
    $("#modaldhari").find('#modal-message').text(message);
    // act = $("#modaldhari").find("form").attr('action');
    act = '/hari/delete/';
    act = act+id_hari;
    $("#modaldhari").find("form").attr('action',act);
});
</script>
@endsection

@section('MODAL')
<!-- MODAL INPUT -->
@yield('MIHARI')
<!-- MODAL UPDATE -->
@yield('MUHARI')
<!-- MODAL DELETE -->
@yield('MDHARI')
<!-- MODAL JS -->
@yield('MODALJSHARI')
@endsection
