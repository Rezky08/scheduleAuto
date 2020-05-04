@section('hariJsHeader')
<script>
    let hari = @json($hari);
</script>
@endsection

@section('hariJsFooter')
<script>
    function loadHari(hari) {

    // table view modification
    let table = $("#table-scrollable").find('table');

    // get row without header
    $(table).find('tr').not(':first').remove();

    let row_html = "";
    let row_close = "</tr>\n";
    hari.map(function (item,index) {
        let row_data = "";
        row_html+="<tr id='"+item.id+"'>\n"
        row_data+="<td>"+(index+1)+"</td>\n"
        row_data+="<td>"+item.nama_hari+"</td>\n"
        row_data+=`
        <td>
            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modaluhari'>
            Edit
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target='#modaldhari'>
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
        loadHari(hari);
        $(this).parents('form').find("input[name='cari']").val("");
        $(this).addClass('d-none');
    });

</script>
@endsection
