@section('validasi')
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dissmisable fade show" role="alert">
    <strong>{{$error}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif
@if (session('success'))
@foreach (session('success') as $success)
<div class="alert alert-success alert-dissmisable fade show" role="alert">
    <strong>{{$success}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif
@endsection
