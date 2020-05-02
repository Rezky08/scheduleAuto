@section('MIRUANG')
{{-- Modal input  --}}
<div class="modal fade" id="modaliruang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/ruang/add">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>nama_ruang</label>
                        <input type="text" name="nama_ruang" class="form-control border border-secondary"
                            placeholder="nama_ruang" value="{{old('nama_ruang')}}">

                        @if($errors->has('nama_ruang'))
                        <div class="text-danger">
                            {{ $errors->first('nama_ruang')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>keterangan</label>
                        <input type="text" name="keterangan" class="form-control border border-secondary"
                            placeholder="keterangan" value="{{old('keterangan')}}">

                        @if($errors->has('keterangan'))
                        <div class="text-danger">
                            {{ $errors->first('keterangan')}}
                        </div>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@section('MURUANG')
{{-- modal edit --}}

<div class="modal fade" id="modaluruang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formmodaluruang" method="POST" action="/ruang/update/">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>nama_ruang</label>
                        <input type="text" name="nama_ruang" class="form-control border border-secondary"
                            placeholder="nama_ruang" value="{{old('nama_ruang')}}">

                        @if($errors->has('nama_ruang'))
                        <div class="text-danger">
                            {{ $errors->first('nama_ruang')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>keterangan</label>
                        <input type="text" name="keterangan" class="form-control border border-secondary"
                            placeholder="keterangan" value="{{old('keterangan')}}">

                        @if($errors->has('keterangan'))
                        <div class="text-danger">
                            {{ $errors->first('keterangan')}}
                        </div>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Edit">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('MDRUANG')

<div id="modaldruang" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="text-white">Hapus Ruang</h5>
            </div>
            <div class="modal-body">
                <strong id="modal-message">Apakah anda ingin menghapus ruang ini ?</strong>
                <form action="ruang/delete/" method="post" class="text-right">
                    @csrf
                    <button type="submit" class="btn btn-warning">Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        Tidak
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('MODALJSRUANG')
<script>
    $('button[data-target="#modaluruang"]').on('click', function () {
        row_parent = $(this).parents('tr');
        id_ruang = $(row_parent).attr('id');
        child = $(row_parent).children();
        $.map(child, function (item, index) {
            field = $(item).attr('id');
            value = $(item).text().trim();
            if (field!=undefined) {
                el = $("#formmodaluruang").find("[name='"+field+"']");
                tagname = $(el).prop('tagName').toLowerCase();
                if (tagname=="select") {
                    $(el).children('option:selected').removeAttr('selected');
                    $(el).children("option[value='"+value+"']").attr('selected','selected');
                }else{
                    $(el).val(value);
                }
            }
        });

        // act = $("#formmodaluruang").attr('action');
        act = '/ruang/update/';
        act = act+id_ruang;
        $("#formmodaluruang").attr('action',act);
    });
    $("button[data-target='#modaldruang']").on('click', function () {
        id = $(this).attr('data-id');
        row_parent = $(this).parents('tr');
        id_ruang= $(row_parent).attr('id');
        nama_ruang = $(row_parent).find("#nama_ruang").text()
        message = "Apakah anda ingin menghapus Ruang "+nama_ruang+" ("+id_ruang+") ?";
        $("#modaldruang").find('#modal-message').text(message);
        // act = $("#modaldruang").find("form").attr('action');
        act = '/ruang/delete/';
        act = act+id_ruang;
        $("#modaldruang").find("form").attr('action',act);
        console.log(act);
    });
</script>
@endsection



@section('MIHARI')
{{-- Modal input  --}}
<div class="modal fade" id="modalihari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/hari/add">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Nama hari</label>
                        <input type="text" name="nama_hari" class="form-control border border-secondary"
                            placeholder="Nama hari" value="{{old('nama_hari')}}">

                        @if($errors->has('nama_hari'))
                        <div class="text-danger">
                            {{ $errors->first('nama_hari')}}
                        </div>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('MUHARI')
{{-- modal edit --}}

<div class="modal fade" id="modaluhari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formmodaluhari" method="POST" action="/hari/update/">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Nama hari</label>
                        <input type="text" name="nama_hari" class="form-control border border-secondary"
                            placeholder="Nama hari" value="{{old('nama_hari')}}">

                        @if($errors->has('nama_hari'))
                        <div class="text-danger">
                            {{ $errors->first('nama_hari')}}
                        </div>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Edit">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('MDHARI')

<div id="modaldhari" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="text-white">Hapus Hari</h5>
            </div>
            <div class="modal-body">
                <strong id="modal-message">Apakah anda ingin menghapus hari ini ?</strong>
                <form action="hari/delete/" method="post" class="text-right">
                    @csrf
                    <button type="submit" class="btn btn-warning">Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        Tidak
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('MODALJSHARI')
<script>
    $('button[data-target="#modaluhari"]').on('click', function () {
        row_parent = $(this).parents('tr');
        id_hari = $(row_parent).attr('id');
        child = $(row_parent).children();
        $.map(child, function (item, index) {
            field = $(item).attr('id');
            value = $(item).text().trim();
            if (field!=undefined) {
                el = $("#formmodaluhari").find("[name='"+field+"']");
                tagname = $(el).prop('tagName').toLowerCase();
                if (tagname=="select") {
                    $(el).children('option:selected').removeAttr('selected');
                    $(el).children("option[value='"+value+"']").attr('selected','selected');
                }else{
                    $(el).val(value);
                }
            }
        });

        // act = $("#formmodaluhari").attr('action');
        act = '/hari/update/';
        act = act+id_hari;
        $("#formmodaluhari").attr('action',act);
    });
    $("button[data-target='#modaldhari']").on('click', function () {
        row_parent = $(this).parents('tr');
        id_hari = $(row_parent).attr('id');
        nama_hari = $(row_parent).find("#nama_hari").text()
        message = "Apakah anda ingin menghapus hari "+nama_hari+" ("+id_hari+") ?";
        $("#modaldhari").find('#modal-message').text(message);
        // act = $("#modaldhari").find("form").attr('action');
        act = '/hari/delete/';
        act = act+id_hari;
        $("#modaldhari").find("form").attr('action',act);
        console.log(act);
    });
</script>
@endsection

@section('MIJAM')
{{-- Modal input  --}}
<div class="modal fade" id="modalijam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/jam/add">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>jam_mulai</label>
                        <input type="text" name="jam_mulai" class="form-control border border-secondary"
                            placeholder="jam_mulai" value="{{old('jam_mulai')}}">

                        @if($errors->has('jam_mulai'))
                        <div class="text-danger">
                            {{ $errors->first('jam_mulai')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>jam_selesai</label>
                        <input type="text" name="jam_selesai" class="form-control border border-secondary"
                            placeholder="jam_selesai" value="{{old('jam_selesai')}}">

                        @if($errors->has('jam_selesai'))
                        <div class="text-danger">
                            {{ $errors->first('jam_selesai')}}
                        </div>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('MUJAM')
{{-- modal edit --}}

<div class="modal fade" id="modalujam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formmodalujam" method="POST" action="/jam/update/">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>jam_mulai</label>
                        <input type="text" name="jam_mulai" class="form-control border border-secondary"
                            placeholder="jam_mulai" value="{{old('jam_mulai')}}">

                        @if($errors->has('jam_mulai'))
                        <div class="text-danger">
                            {{ $errors->first('jam_mulai')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>jam_selesai</label>
                        <input type="text" name="jam_selesai" class="form-control border border-secondary"
                            placeholder="jam_selesai" value="{{old('jam_selesai')}}">

                        @if($errors->has('jam_selesai'))
                        <div class="text-danger">
                            {{ $errors->first('jam_selesai')}}
                        </div>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Edit">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('MDJAM')

<div id="modaldjam" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="text-white">Hapus Sesi</h5>
            </div>
            <div class="modal-body">
                <strong id="modal-message">Apakah anda ingin menghapus sesi ini ?</strong>
                <form action="jam/delete/" method="post" class="text-right">
                    @csrf
                    <button type="submit" class="btn btn-warning">Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        Tidak
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('MODALJSJAM')
<script>
    $('button[data-target="#modalujam"]').on('click', function () {
        id = $(this).attr('data-id');
        act = $("#formmodalujam").attr('action');
        act = act+id;
        $("#formmodalujam").attr('action',act);
    });
    $("tr").on('click', function () {
        id = $(this).find('button[data-target="#modaldjam"]').attr('data-id');
        jam_mulai = $(this).find("#jam_mulai").text()
        jam_selesai = $(this).find("#jam_selesai").text()
        message = "Apakah anda ingin menghapus sesi "+jam_mulai+"-"+jam_selesai+" ("+id+") ?";
        $("#modaldjam").find('#modal-message').text(message);
        act = $("#modaldjam").find("form").attr('action');
        act = act+id;
        $("#modaldjam").find("form").attr('action',act);
        console.log(act);
    });
</script>
@endsection
@section('MODAL')
@yield('MI'.$modal_name ?? '')
@yield('MU'.$modal_name ?? '')
@yield('MD'.$modal_name ?? '')
@yield('MODALJS'.$modal_name ?? '')
@endsection
