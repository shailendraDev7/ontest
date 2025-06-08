@if(isset($folder) && session($folder)!=null)
    @foreach(session($folder) as $k=>$i)
        <div class="col-md-4 mb-3">
            <img class="__h-60p" src="{{$i['image']}}"/>
            <div  class="__w-70p bg-white">
                <a onclick="removeImage('{{$i['remove_route']}}'+'/'+'{{$k}}'+'/'+'{{$folder}}','{{$modal_id}}')"
                   href="javascript:" class="call-when-done">
                    <center class="text-danger">
                        <i class="fa fa-trash"></i>
                    </center>
                </a>
            </div>
        </div>
    @endforeach
@endif
