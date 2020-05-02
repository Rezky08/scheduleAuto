
@section('MIMATKUL')
    @component('admin.component.matkul_modal_form')
        @slot('modal_id')
        modalimatkul
        @endslot

        @slot('modal_title')
        Tambah Mata Kuliah
        @endslot

        @slot('action')
        /matkul/add
        @endslot
    @endcomponent
@endsection

@section('MUMATKUL')
    @component('admin.component.matkul_modal_form')
    @slot('modal_id')
    modalumatkul
    @endslot

    @slot('modal_title')
    Ubah Mata Kuliah
    @endslot

    @slot('action')
    /matkul/update/
    @endslot
    @endcomponent
@endsection

@section('MDMATKUL')
    @component('admin.component.modal_form')
    @slot('modal_id')
    modaldmatkul
    @endslot

    @slot('modal_title')
        <h5 class="text-white">Hapus Mata Kuliah</h5>
    @endslot

    @slot('action')
    /matkul/delete/
    @endslot

    @slot('modal_header_class')
    bg-danger
    @endslot

    @slot('form_fields')
    <strong id="modal-message">Apakah anda ingin menghapus mata kuliah ini ?</strong>
    @endslot

    @slot('modal_footer')
    <button type="submit" class="btn btn-warning">Ya</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
        Tidak
    </button>
    @endslot

    @endcomponent
@endsection

@section('MODALJSMATKUL')
<script>
    let mata_kuliah = @json($mata_kuliah);
    let program_studi = @json($program_studi);
    // add program_studi option
    let program_studi_option = "";
    program_studi.forEach(item => {
        program_studi_option+="<option value='"+item.kode_prodi+"'>"+item.nama_prodi+"</option>\n"
    });
    $(program_studi_option).appendTo("select[name='kode_prodi']");

// Button update matkul
$('button[data-target="#modalumatkul"]').on('click', function () {
    row_parent = $(this).parents('tr');
    id_matkul = $(row_parent).attr('id');
    mata_kuliah_item = mata_kuliah.find(function (item,index) {
        if(item.id==id_matkul){
            return item;
        }
     });

    form = $("#modalumatkul #formmodal");
    $(form).find("[name='kode_matkul']").val(mata_kuliah_item.kode_matkul);
    $(form).find("[name='nama_matkul']").val(mata_kuliah_item.nama_matkul);
    $(form).find("[name='sks_matkul']").val(mata_kuliah_item.sks_matkul);
    $(form).find("[name='status_matkul'] option:selected").removeAttr('selected');
    $(form).find("[name='status_matkul'] option[value='"+mata_kuliah_item.status_matkul+"']").attr('selected','selected');

    $(form).find("[name='lab_matkul'] option:selected").removeAttr('selected');
    $(form).find("[name='lab_matkul'] option[value='"+mata_kuliah_item.lab_matkul+"']").removeAttr('selected');

    $(form).find("[name='kode_prodi'] option:selected").removeAttr('selected');
    $(form).find("[name='kode_prodi'] option[value='"+mata_kuliah_item.kode_prodi+"']").removeAttr('selected');

    act = '/matkul/update/';
    act = act+id_matkul;
    $(form).attr('action',act);
});
// Button delete matkul
$("button[data-target='#modaldmatkul']").on('click', function () {

    kode_matkul = $(this).attr('data-kode-matkul');
    row_parent = $(this).parents('tr');
    id_matkul = $(row_parent).attr('id');
    nama_matkul = $(row_parent).find("#nama_matkul").text()
    message = "Apakah anda ingin menghapus mata kuliah "+nama_matkul+" ("+kode_matkul+") ?";
    $("#modaldmatkul").find('#modal-message').text(message);
    // act = $("#modaldmatkul").find("form").attr('action');
    act = '/matkul/delete/';
    act = act+id_matkul;
    $("#modaldmatkul").find("form").attr('action',act);
});
</script>
@endsection

@section('MODAL')
    <!-- MODAL INPUT -->
    @yield('MIMATKUL')
    <!-- MODAL UPDATE -->
    @yield('MUMATKUL')
    <!-- MODAL DELETE -->
    @yield('MDMATKUL')
    <!-- MODAL JS -->
    @yield('MODALJSMATKUL')
@endsection


