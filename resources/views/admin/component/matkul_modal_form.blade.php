@component('admin.component.modal_form')
@slot('modal_id')
@isset($modal_id)
{{$modal_id}}
@endisset
@endslot

@slot('modal_title')
@isset($modal_title)
{{$modal_title}}
@endisset
@endslot

@slot('action')
@isset($action)
{{$action}}
@endisset
@endslot

@slot('form_fields')
<div class="form-group">
    <label>Kode Matkul</label>
    <input type="text" name="kode_matkul" class="form-control border border-secondary" placeholder="kode_matkul">

    @if($errors->has('kode_matkul'))
    <div class="text-danger">
        {{ $errors->first('kode_matkul')}}
    </div>
    @endif

</div>

<div class="form-group">
    <label>Nama Matkul</label>
    <input type="text" name="nama_matkul" class="form-control border border-secondary" placeholder="Nama Matkul">

    @if($errors->has('nama_matkul'))
    <div class="text-danger">
        {{ $errors->first('nama_matkul')}}
    </div>
    @endif

</div>

<div class="form-group">
    <label>Sks</label>
    <input type="number" name="sks_matkul" class="form-control border border-secondary" placeholder="Sks">

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
    </select>

    @if($errors->has('kode_prodi'))
    <div class="text-danger">
        {{ $errors->first('kode_prodi')}}
    </div>
    @endif

</div>
@endslot

@slot('modal_footer')
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Simpan">
</div>
@endslot

@endcomponent
