<div class="modal fade" @isset($modal_id) {!! "id='" .$modal_id."'"!!} @endisset tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header @isset ($modal_header_class)
            {{$modal_header_class}}
            @endisset">
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
                <form id="formmodal" method="POST" @isset($action) {!! "action='" .$action."'" !!} @else
                    {!! "action='#'" !!} @endisset>
                    {{ csrf_field() }}
                    @isset($form_fields)
                    {{$form_fields}}
                    @endisset
            </div>

            <div class="modal-footer">
                @isset($modal_footer)
                {{$modal_footer}}
                @endisset
                </form>
            </div>
        </div>
    </div>
</div>
