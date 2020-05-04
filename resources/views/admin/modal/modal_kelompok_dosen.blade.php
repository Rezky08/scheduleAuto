@section('MIKELDOS')
@component('components.kelompok_dosen_modal_form')
@slot('modal_id')
modalikeldos
@endslot

@slot('modal_title')
Tambah Mata Kuliah
@endslot

@slot('action')
/kelompok_dosen/detail/add
@endslot
@endcomponent
@endsection

@section('MUKELDOS')
@component('components.kelompok_dosen_modal_form')
@slot('modal_id')
modalukeldos
@endslot

@slot('modal_title')
Ubah Mata Kuliah
@endslot

@slot('action')
/kelompok_dosen/detail/update/
@endslot
@endcomponent
@endsection

@section('MDKELDOS')
@component('components.modal_form')
@slot('modal_id')
modaldkeldos
@endslot

@slot('modal_title')
<h5 class="text-white">Hapus Mata Kuliah</h5>
@endslot

@slot('action')
/kelompok_dosen/detail/delete/
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

@section('MODALJSKELDOS')
<script>
    // load mata kuliah table
    loadKeldos(kelompok_dosen);

    // add program_studi option
    let kelompok_dosen_option = "";
    kelompok_dosen.forEach(item => {
        kelompok_dosen_option+="<option value='"+item.peminat_id+"'>"+item.peminat_id+"</option>\n"
    });
    $(kelompok_dosen_option).appendTo("select[name='cari']");

    // Button update keldos
    $('button[data-target="#modalukeldos"]').on('click', function () {
        row_parent = $(this).parents('tr');
        id_keldos = $(row_parent).attr('id');
        mata_kuliah_item = mata_kuliah.find(function (item,index) {
            if(item.id==id_keldos){
                return item;
            }
        });

        form = $("#modalukeldos #formmodal");
        $(form).find("[name='kode_keldos']").val(mata_kuliah_item.kode_keldos);
        $(form).find("[name='nama_keldos']").val(mata_kuliah_item.nama_keldos);
        $(form).find("[name='sks_keldos']").val(mata_kuliah_item.sks_keldos);
        $(form).find("[name='status_keldos'] option:selected").removeAttr('selected');
        $(form).find("[name='status_keldos'] option[value='"+mata_kuliah_item.status_keldos+"']").attr('selected','selected');
        $(form).find("[name='lab_keldos'] option:selected").removeAttr('selected');
        $(form).find("[name='lab_keldos'] option[value='"+mata_kuliah_item.lab_keldos+"']").attr('selected','selected');
        $(form).find("[name='kode_prodi'] option:selected").removeAttr('selected');
        $(form).find("[name='kode_prodi'] option[value='"+mata_kuliah_item.kode_prodi+"']").attr('selected','selected');

        act = '/kelompok_dosen/detail/update/';
        act = act+id_keldos;
        $(form).attr('action',act);
    });
    // Button delete keldos
    $("button[data-target='#modaldkeldos']").on('click', function () {
        row_parent = $(this).parents('tr');
        id_keldos = $(row_parent).attr('id');
        keldos_item = mata_kuliah.filter(function (item) {
            if (item.id == id_keldos) {
                return item;
            }
         })[0];
        message = "Apakah anda ingin menghapus mata kuliah "+keldos_item.nama_keldos+" ("+keldos_item.kode_keldos+") ?";
        $("#modaldkeldos").find('#modal-message').text(message);
        // act = $("#modaldkeldos").find("form").attr('action');
        act = '/kelompok_dosen/detail/delete/';
        act = act+id_keldos;
        $("#modaldkeldos").find("form").attr('action',act);
    });
</script>
@endsection

@section('MODAL')
<!-- MODAL INPUT -->
@yield('MIKELDOS')
<!-- MODAL UPDATE -->
@yield('MUKELDOS')
<!-- MODAL DELETE -->
@yield('MDKELDOS')
<!-- MODAL JS -->
@yield('MODALJSKELDOS')
@endsection
