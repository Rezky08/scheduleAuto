@section('keldosJsHeader')
<script>
    let kelompok_dosen_detail = @json($kelompok_dosen);
    let kelompok_dosen = @json($kelompok_dosen);
</script>
@endsection

@section('keldosJsFooter')
<script>
    function loadKeldos(kelompok_dosen) {
    // let trans_val = {
    //     lab_keldos : {
    //         0 : "Kelas",
    //         1 : "Lab"
    //     },
    //     status_keldos: {
    //         0 : "Tidak Aktif",
    //         1 : "Aktif"
    //     }
    // }
    // table view modification
    let table = $("#table-scrollable").find('table');

    // get row without header
    $(table).find('tr').not(':first').remove();

    let row_html = "";
    let row_close = "</tr>\n";
    kelompok_dosen.map(function (item,index) {
        let row_data = "";
        row_html+="<tr id='"+item.id+"'>\n"
        row_data+="<td>"+(index+1)+"</td>\n"
        row_data+="<td>"+item.peminat_id+"</td>\n"
        row_data+="<td>"+item.kode_matkul+"</td>\n"
        row_data+="<td>"+item.kelompok+"</td>\n"
        row_data+="<td>"+item.kapasitas+"</td>\n"
        row_data+="<td>"+item.kode_dosen+"</td>\n"
        // row_data+="<td>"+trans_val.status_keldos[item.status_keldos]+"</td>\n"
        // row_data+="<td>"+trans_val.lab_keldos[item.lab_keldos]+"</td>\n"
        // row_data+="<td>"+item.kode_prodi+"</td>\n"
        row_data+=`
        <td>
            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalukeldos'>
            Edit
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target='#modaldkeldos'>
            Hapus
            </button>
        </td>`
        row_html+=row_data;
        row_html+=row_close;
     });
    $(row_html).appendTo(table);
    }

    // ini buat handle search button dan reset
    $("#search-box").find('form').submit(function (e) {
        e.preventDefault();

        $(this).find("#btn-cari-reset").removeClass('d-none');
    });
    $("#btn-cari-reset").click(function (e) {
        e.preventDefault();
        loadKeldos(kelompok_dosen);
        $(this).parents('form').find("input[name='cari']").val("");
        $(this).addClass('d-none');
    });

</script>
@endsection
