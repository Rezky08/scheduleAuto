@section('footer_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
@section('search_box_script')
    <script>
        function search_box_handle(form,callback) {
            let cari = $(form).find("input[name='cari']").val();
            let endpoint_target = $(form).attr('endpoint-target');
            let url = host.url+endpoint_target+"?q="+cari;
            let result = fetch(url);
            let data_results;
            result.then(resp => resp.json())
            .then(resp=>{
                return resp.data;
            }).then(data=>{
                callback(data);
                return data;
            });
            return false;
        }
    </script>
@endsection
