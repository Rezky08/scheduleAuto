@component('components.modal_form')

@slot('modal_id')
{{$modal_id}}
@endslot

@isset($modal_header_class)
@slot('modal_header_class')
{{$modal_header_class}}
@endslot
@endisset

@isset($modal_title_class)
@slot('modal_title_class')
{{$modal_title_class}}
@endslot
@endisset

@slot('action')
{{$action}}
@endslot

@slot('form_fields')
<div class="form-group">
    <label>Nama hari</label>
    <input type="text" name="nama_hari" class="form-control border border-secondary" placeholder="Nama Hari">

    @if($errors->has('nama_hari'))
    <div class="text-danger">
        {{ $errors->first('nama_hari')}}
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
