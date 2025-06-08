@extends('layouts.back-end.app')

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="{{asset('/public/assets/back-end/img/business-setup.png')}}" alt="">
                {{\App\CPU\translate('Business_Setup')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
    @include('admin-views.business-settings.business-setup-inline-menu')
    <!-- End Inlile Menu -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <form action="{{ route('admin.product-settings.inhouse-shop') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 d-flex gap-2 flex-wrap">
                                <img src="{{asset('/public/assets/back-end/img/footer-logo.png')}}" alt="">
                                {{\App\CPU\translate('Shop_cover_Image')}}
                            </h5>
                        </div>
                        <div class="card-body">
                            <center>
                                <img id="viewerShop" width="300"
                                     onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                     src="{{asset('storage/app/public/shop')}}/{{\App\CPU\Helpers::get_business_settings('shop_banner')}}">
                            </center>
                            <div class="position-relative mt-4">
                                <input type="file" name="shop_banner" id="customFileUploadShop"
                                       class="custom-file-input"
                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label" for="customFileUploadShop">
                                    {{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}
                                </label>
                            </div>
                            <div class="d-flex justify-content-end mt-30">
                                <button type="submit" class="btn btn--primary px-4">{{\App\CPU\translate('Upload')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
