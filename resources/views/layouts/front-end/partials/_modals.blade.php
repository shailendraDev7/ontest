@php($banner=\App\Model\Banner::inRandomOrder()->where(['published'=>1,'banner_type'=>'Popup Banner'])->first())
@if(isset($banner))
    <div class="modal fade" id="popup-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 __p-1px">
                    <button type="button" class="close __close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body cursor-pointer __p-3px" onclick="location.href='{{$banner['url']}}'">
                    <img class="d-block w-100"
                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                         src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}"
                         alt="">
                </div>
            </div>
        </div>
    </div>
@endif
