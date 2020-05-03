<div id="search-box">
    <form action="@isset($action)
        {{$action}}
    @endisset" method="GET" class="form-inline"
    @isset($endpoint_target)
        {{"endpoint-target=".$endpoint_target.""}}
    @endisset
    @isset($callback)
        {!!"onsubmit='return search_box_handle(this,".$callback.")'"!!}
    @else
        {!!"onsubmit='return search_box_handle(this)'"!!}
    @endisset
    >
        <div class="form-group">
            <label for="">@isset($label)
                {{$label}}
            @endisset &nbsp;</label>
            <input type="text" class="form-control" name="cari" placeholder="@isset($placeholder)
                {{$placeholder}}
            @endisset">
        </div>
        <input id="btn-cari" class="btn btn-primary ml-3" type="submit" value="CARI">
        <button id="btn-cari-reset" type="button" class="d-none btn btn-success mx-2">Reset</button>
    </form>
</div>

