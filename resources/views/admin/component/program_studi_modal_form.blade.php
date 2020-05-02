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
    <label>Kode prodi</label>
    <input type="text" name="kode_prodi" class="form-control border border-secondary" placeholder="kode_prodi">

    @if($errors->has('kode_prodi'))
    <div class="text-danger">
        {{ $errors->first('kode_prodi')}}
    </div>
    @endif

</div>

<div class="form-group">
    <label>Nama prodi</label>
    <input type="text" name="nama_prodi" class="form-control border border-secondary" placeholder="nama_prodi">

    @if($errors->has('nama_prodi'))
    <div class="text-danger">
        {{ $errors->first('nama_prodi')}}
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
