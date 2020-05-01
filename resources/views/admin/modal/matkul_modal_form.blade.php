@section('FMATKUL')
<div class="modal fade" id="@isset($modal_id)
{{$modal_id}}
@endisset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @isset ($modal_title)
                        {{$modal_title}}
                    @else
                        {{"Modal Title"}}
                    @endisset
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formmodalmatkul" method="POST"
                @isset($action)
                    {!! "action='".$action."'" !!}
                @else
                    {!! "action=''" !!}
                @endisset
                >
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
                            placeholder="Nama Matkul">

                        @if($errors->has('nama_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('nama_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Sks</label>
                        <input type="number" name="sks_matkul" class="form-control border border-secondary"
                            placeholder="Sks">

                        @if($errors->has('sks_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('sks_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status_matkul" class="form-control border">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>

                        @if($errors->has('status_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('status_matkul')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Lab</label>
                        <select name="lab_matkul" class="form-control border">
                            <option value="1">Lab</option>
                            <option value="0">Kelas</option>
                        </select>

                        @if($errors->has('lab_matkul'))
                        <div class="text-danger">
                            {{ $errors->first('lab_matkul')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Kode Prodi</label>
                        <select name="kode_prodi" class="form-control border">
                            <option value="" disabled selected>Pilih Program Studi</option>
                            @isset ($program_studi)
                                @foreach ($program_studi as $item)
                                <option value="{{$item['kode_prodi']}}" {!!
                                    $item['kode_prodi']==old('kode_prodi')?'selected':'' !!}>{{$item['nama_prodi']}}
                                </option>
                                @endforeach
                            @endisset
                        </select>

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
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
