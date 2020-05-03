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
    <label>Sesi Mulai</label>
    <input type="text" name="sesi_mulai" class="form-control border border-secondary" placeholder="Sesi Mulai">

    @if($errors->has('sesi_mulai'))
    <div class="text-danger">
        {{ $errors->first('sesi_mulai')}}
    </div>
    @endif

</div>

<div class="form-group">
    <label>Sesi Selesai</label>
    <input type="text" name="sesi_selesai" class="form-control border border-secondary" placeholder="Sesi Selesai">

    @if($errors->has('sesi_selesai'))
    <div class="text-danger">
        {{ $errors->first('sesi_selesai')}}
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
