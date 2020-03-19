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
                        <input type="submit" class="btn btn-success" value="Simpan">
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
                        <input type="submit" class="btn btn-success" value="Edit">
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
                    <button type="submit" class="btn btn-success">Ya</button>
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
        id = $(this).attr('data-id');
        act = $("#formmodaluhari").attr('action');
        act = act+id;
        $("#formmodaluhari").attr('action',act);
    });
    $("tr").on('click', function () {
        id = $(this).find('button[data-target="#modaldhari"]').attr('data-id');
        nama_hari = $(this).find("#nama_hari").text()
        message = "Apakah anda ingin menghapus hari "+nama_hari+" ("+id+") ?";
        $("#modaldhari").find('#modal-message').text(message);
        act = $("#modaldhari").find("form").attr('action');
        act = act+kode_matkul;
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
                        <input type="submit" class="btn btn-success" value="Simpan">
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
                <form method="POST" action="/jam/add">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>jam_mulai</label>
                        <input type="time" name="jam_mulai" class="form-control border border-secondary"
                            placeholder="jam_mulai" value="{{old('jam_mulai')}}">

                        @if($errors->has('jam_mulai'))
                        <div class="text-danger">
                            {{ $errors->first('jam_mulai')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>jam_selesai</label>
                        <input type="time" name="jam_selesai" class="form-control border border-secondary"
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
                        <input type="submit" class="btn btn-success" value="Edit">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('MIMATKUL')
{{-- Modal input  --}}
<div class="modal fade" id="modalimatkul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="/matkul/add">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label>Kode Matkul</label>
                        <input type="text" name="kode_matkul" class="form-control border border-secondary"
                            placeholder="kode_matkul" value="{{old('kode_matkul')}}">

                        @if($errors->has('kode_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('kode_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama Matkul</label>
                        <input type="text" name="nama_matkul" class="form-control border border-secondary"
                            placeholder="Nama Matkul" value="{{old('nama_matkul')}}">

                        @if($errors->has('nama_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('nama_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Sks</label>
                        <input type="number" name="sks_matkul" class="form-control border border-secondary"
                            placeholder="Sks" value="{{old('sks_matkul')}}">

                        @if($errors->has('sks_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('sks_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status_matkul" class="form-control border border-secondary"
                            placeholder="Status" value="{{old('status_matkul')}}">

                        @if($errors->has('status_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('status_matkul')}}
                        </div>
                        @endif

                    </div>


                    <div class="form-group">
                        <label>Kode Prodi</label>
                        <input type="text" name="kode_prodi" class="form-control border border-secondary"
                            placeholder="Kode Prodi" value="{{old('kode_prodi')}}">

                        @if($errors->has('kode_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('kode_prodi')}}
                        </div>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('MUMATKUL')
<div class="modal fade" id="modalumatkul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form id="formmodalumatkul" method="POST" action="/matkul/update/">

                    {{ csrf_field() }}



                    <div class="form-group">
                        <label>Kode Matkul</label>
                        <input type="text" name="kode_matkul" class="form-control border border-secondary"
                            placeholder="kode_matkul" value="{{old('kode_matkul')}}">

                        @if($errors->has('kode_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('kode_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama Matkul</label>
                        <input type="text" name="nama_matkul" class="form-control border border-secondary"
                            placeholder="Kama Matkul" value="{{old('nama_matkul')}}">

                        @if($errors->has('nama_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('nama_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Sks</label>
                        <input type="number" name="sks_matkul" class="form-control border border-secondary"
                            placeholder="Sks" value="{{old('sks_matkul')}}">

                        @if($errors->has('sks_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('sks_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status_matkul" class="form-control border border-secondary"
                            placeholder="Status" value="{{old('status_matkul')}}">

                        @if($errors->has('status_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('status_matkul')}}
                        </div>
                        @endif

                    </div>


                    <div class="form-group">
                        <label>Kode Prodi</label>
                        <input type="text" name="kode_prodi" class="form-control border border-secondary"
                            placeholder="Kode Prodi" value="{{old('kode_prodi')}}">

                        @if($errors->has('kode_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('kode_prodi')}}
                        </div>
                        @endif

                    </div>
            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Edit">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('MDMATKUL')

<div id="modaldmatkul" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="text-white">Hapus Mata Kuliah</h5>
            </div>
            <div class="modal-body">
                <strong id="modal-message">Apakah anda ingin menghapus mata kuliah ini ?</strong>
                <form action="matkul/delete/" method="post" class="text-right">
                    @csrf
                    <button type="submit" class="btn btn-success">Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        Tidak
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('MODALJSMATKUL')
<script>
    $('button[data-target="#modalumatkul"]').on('click', function () {
        kode_matkul = $(this).attr('data-kode_matkul');
        act = $("#formmodalumatkul").attr('action');
        act = act+kode_matkul;
        $("#formmodalumatkul").attr('action',act);
    });
    $("tr").on('click', function () {
        kode_matkul = $(this).find('button[data-target="#modaldmatkul"]').attr('data-kode_matkul');
        nama_matkul = $(this).find("#nama_matkul").text()
        message = "Apakah anda ingin menghapus mata kuliah "+nama_matkul+" ("+kode_matkul+") ?";
        $("#modaldmatkul").find('#modal-message').text(message);
        act = $("#modaldmatkul").find("form").attr('action');
        act = act+kode_matkul;
        $("#modaldmatkul").find("form").attr('action',act);
        console.log(act);
    });
</script>
@endsection

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
                        <input type="submit" class="btn btn-success" value="Simpan">
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
                        <input type="submit" class="btn btn-success" value="Edit">
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
                    <button type="submit" class="btn btn-success">Ya</button>
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
        id = $(this).attr('data-id');
        act = $("#formmodaluruang").attr('action');
        act = act+kode_matkul;
        $("#formmodaluruang").attr('action',act);
    });
    $("tr").on('click', function () {
        id = $(this).find('button[data-target="#modaldruang"]').attr('data-id');
        nama_matkul = $(this).find("#nama_ruang").text()
        message = "Apakah anda ingin menghapus ruang "+nama_ruang+" ("+id+") ?";
        $("#modaldruang").find('#modal-message').text(message);
        act = $("#modaldruang").find("form").attr('action');
        act = act+id;
        $("#modaldruang").find("form").attr('action',act);
        console.log(act);
    });
</script>
@endsection

@section('MIPRODI')
{{-- Modal input  --}}
<div class="modal fade" id="modaliprodi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="/program_studi/add">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Kode prodi</label>
                        <input type="text" name="kode_prodi" class="form-control border border-secondary"
                            placeholder="kode_prodi" value="{{old('kode_prodi')}}">

                        @if($errors->has('kode_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('kode_prodi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama prodi</label>
                        <input type="text" name="nama_prodi" class="form-control border border-secondary"
                            placeholder="nama_prodi" value="{{old('nama_prodi')}}">

                        @if($errors->has('nama_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('nama_prodi')}}
                        </div>
                        @endif

                    </div>

            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('MUPRODI')
{{-- modal edit --}}

<div class="modal fade" id="modaluprodi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="/program_studi/add">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Kode prodi</label>
                        <input type="text" name="kode_prodi" class="form-control border border-secondary"
                            placeholder="kode_prodi" value="{{old('kode_prodi')}}">

                        @if($errors->has('kode_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('kode_prodi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama prodi</label>
                        <input type="text" name="nama_prodi" class="form-control border border-secondary"
                            placeholder="nama_prodi" value="{{old('nama_prodi')}}">

                        @if($errors->has('nama_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('nama_prodi')}}
                        </div>
                        @endif

                    </div>

            </div>
            <div class="modal-footer">
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Edit">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('MDPRODI')

<div id="modaldprodi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="text-white">Hapus Prodi</h5>
            </div>
            <div class="modal-body">
                <strong id="modal-message">Apakah anda ingin menghapus prodi ini ?</strong>
                <form action="program_studi/delete/" method="post" class="text-right">
                    @csrf
                    <button type="submit" class="btn btn-success">Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        Tidak
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('MODALJSPRODI')
<script>
    $('button[data-target="#modaluprodi"]').on('click', function () {
        kode_prodi = $(this).attr('data-kode_prodi');
        act = $("#formmodaluprodi").attr('action');
        act = act+kode_prodi;
        $("#formmodaluprodi").attr('action',act);
    });
    $("tr").on('click', function () {
        kode_prodi = $(this).find('button[data-target="#modaldprodi"]').attr('data-kode_prodi');
        nama_prodi = $(this).find("#nama_prodi").text()
        message = "Apakah anda ingin menghapus prodi "+nama_prodi+" ("+kode_prodi+") ?";
        $("#modaldprodi").find('#modal-message').text(message);
        act = $("#modaldprodi").find("form").attr('action');
        act = act+kode_matkul;
        $("#modaldprodi").find("form").attr('action',act);
        console.log(act);
    });
</script>
@endsection

@section('MODAL')
@yield('MI'.$modal_name)
@yield('MU'.$modal_name)
@yield('MD'.$modal_name)
@yield('MODALJS'.$modal_name)
@endsection
