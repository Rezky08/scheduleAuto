@section('MIHARI')
{{-- Modal input  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            placeholder="Nama hari">

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

@section('MIJAM')
{{-- Modal input  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            placeholder="jam_mulai">

                        @if($errors->has('jam_mulai'))
                        <div class="text-danger">
                            {{ $errors->first('jam_mulai')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>jam_selesai</label>
                        <input type="time" name="jam_selesai" class="form-control border border-secondary"
                            placeholder="jam_selesai">

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

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            placeholder="jam_mulai">

                        @if($errors->has('jam_mulai'))
                        <div class="text-danger">
                            {{ $errors->first('jam_mulai')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>jam_selesai</label>
                        <input type="time" name="jam_selesai" class="form-control border border-secondary"
                            placeholder="jam_selesai">

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            placeholder="Kama Matkul" value="{{old('nama_matkul')}}">

                        @if($errors->has('nama_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('nama_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Sks</label>
                        <input type="number" name="sks_matkul" class="form-control border border-secondary" placeholder="Sks" value="{{old('sks_matkul')}}">

                        @if($errors->has('sks'))
                        <div class="text-danger">
                            {{ $errors->first('sks')}}
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
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <label>Kode Matkul</label>
                        <input type="text" name="kode_matkul" class="form-control border border-secondary"
                            placeholder="kode_matkul">

                        @if($errors->has('kode_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('kode_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama Matkul</label>
                        <input type="text" name="nama_matkul" class="form-control border border-secondary"
                            placeholder="Kama Matkul">

                        @if($errors->has('nama_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('nama_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Sks</label>
                        <input type="number" name="sks" class="form-control border border-secondary" placeholder="Sks">

                        @if($errors->has('sks'))
                        <div class="text-danger">
                            {{ $errors->first('sks')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status_matkul" class="form-control border border-secondary"
                            placeholder="Status">

                        @if($errors->has('status_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('status_matkul')}}
                        </div>
                        @endif

                    </div>


                    <div class="form-group">
                        <label>Kode Prodi</label>
                        <input type="text" name="kode_prodi" class="form-control border border-secondary"
                            placeholder="Kode Prodi">

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

@section('MIRUANG')
{{-- Modal input  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            placeholder="nama_ruang">

                        @if($errors->has('nama_ruang'))
                        <div class="text-danger">
                            {{ $errors->first('nama_ruang')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>keterangan</label>
                        <input type="text" name="keterangan" class="form-control border border-secondary"
                            placeholder="keterangan">

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

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            placeholder="nama_ruang">

                        @if($errors->has('nama_ruang'))
                        <div class="text-danger">
                            {{ $errors->first('nama_ruang')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>keterangan</label>
                        <input type="text" name="keterangan" class="form-control border border-secondary"
                            placeholder="keterangan">

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

@section('MIPRODI')
{{-- Modal input  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            placeholder="kode_prodi">

                        @if($errors->has('kode_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('kode_prodi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama prodi</label>
                        <input type="text" name="nama_prodi" class="form-control border border-secondary"
                            placeholder="nama_prodi">

                        @if($errors->has('nama_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('nama_prodi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="nama_prodi" class="form-control border border-secondary"
                            placeholder="nama_prodi">

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

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            placeholder="kode_prodi">

                        @if($errors->has('kode_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('kode_prodi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama prodi</label>
                        <input type="text" name="nama_prodi" class="form-control border border-secondary"
                            placeholder="nama_prodi">

                        @if($errors->has('nama_prodi'))
                        <div class="text-danger">
                            {{ $errors->first('nama_prodi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="nama_prodi" class="form-control border border-secondary"
                            placeholder="nama_prodi">

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
