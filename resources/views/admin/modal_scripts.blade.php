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
