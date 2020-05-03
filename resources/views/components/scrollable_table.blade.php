<div id="table-scrollable">
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-bordered">
            <tr>
                @isset($table_header)
                    @foreach ($table_header as $head)
                        <th>{{$head}}</th>
                    @endforeach
                @else
                    @foreach ($table_data[0] as $head=>$data)
                        <th>{{$head}}</th>
                    @endforeach
                @endisset
                <th>Opsi</th>
            </tr>
            @isset($table_data)
                @foreach ($table_data as $data)
                <tr id="{{$data['id']}}">
                    @foreach ($data as $key=>$item)
                        <td id="{{$key}}"> {{$item}}</td>
                    @endforeach
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            @isset($modal_target['update'])
                                {{"data-target=".$modal_target['update'].""}}
                            @endisset>
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                        @isset($modal_target['delete'])
                        {{"data-target=".$modal_target['delete'].""}}
                        @endisset>
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            @endisset

        </table>
    </div>
</div>
