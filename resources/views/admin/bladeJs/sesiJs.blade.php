@section('sesiJsHeader')
<script>
    let sesi = @json($sesi);
</script>
@endsection

@section('sesiJsFooter')
<script>
    function loadSesi(sesi) {

    // table view modification
    let table = $("#table-scrollable").find('table');

    // get row without header
    $(table).find('tr').not(':first').remove();

    let row_html = "";
    let row_close = "</tr>\n";
    sesi.map(function (item,index) {
        let row_data = "";
        row_html+="<tr id='"+item.id+"'>\n"
        row_data+="<td>"+(index+1)+"</td>\n"
        row_data+="<td>"+item.sesi_mulai+"</td>\n"
        row_data+="<td>"+item.sesi_selesai+"</td>\n"
        row_data+=`
        <td>
            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalusesi'>
            Edit
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target='#modaldsesi'>
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
        loadSesi(sesi);
        $(this).parents('form').find("input[name='cari']").val("");
        $(this).addClass('d-none');
    });

</script>
@endsection
