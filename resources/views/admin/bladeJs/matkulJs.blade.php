
@section('matkulJsHeader')
<script>
    let mata_kuliah = @json($mata_kuliah);
    let program_studi = @json($program_studi);
</script>
@endsection

@section('matkulJsFooter')
<script>
    function loadMatkul(mata_kuliah) {
    let trans_val = {
        lab_matkul : {
            0 : "Kelas",
            1 : "Lab"
        },
        status_matkul: {
            0 : "Tidak Aktif",
            1 : "Aktif"
        }
    }
    // table view modification
    let table = $("#table-scrollable").find('table');

    // get row without header
    $(table).find('tr').not(':first').remove();

    let row_html = "";
    let row_close = "</tr>\n";
    mata_kuliah.map(function (item,index) {
        let row_data = "";
        row_html+="<tr id='"+item.id+"'>\n"
        row_data+="<td>"+(index+1)+"</td>\n"
        row_data+="<td>"+item.kode_matkul+"</td>\n"
        row_data+="<td>"+item.nama_matkul+"</td>\n"
        row_data+="<td>"+item.sks_matkul+"</td>\n"
        row_data+="<td>"+trans_val.status_matkul[item.status_matkul]+"</td>\n"
        row_data+="<td>"+trans_val.lab_matkul[item.lab_matkul]+"</td>\n"
        row_data+="<td>"+item.kode_prodi+"</td>\n"
        row_data+=`
        <td>
            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalumatkul'>
            Edit
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target='#modaldmatkul'>
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
        loadMatkul(mata_kuliah);
        $(this).parents('form').find("input[name='cari']").val("");
        $(this).addClass('d-none');
    });

</script>
@endsection
