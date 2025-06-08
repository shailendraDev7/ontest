@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Product in Wishlist Report'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2 align-items-center">
                <img width="20" src="{{asset('/public/assets/back-end/img/product-review.png')}}" alt="">
                {{\App\CPU\translate('product_in_wishlist')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="px-3 pt-4">
                        <div class="row gy-2 gx-1 align-items-center mb-3">
                            <div class="col-xl-3">
                                <form action="{{url()->current()}}" method="GET">
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="{{\App\CPU\translate('Search Product Name')}}" aria-label="Search orders" value="{{ $search }}">
                                        <button type="submit" class="btn btn--primary">{{\App\CPU\translate('search')}}</button>
                                    </div>
                                    <!-- End Search -->
                                </form>
                            </div>

                            <div class="col-xl-9">
                                <form action="#" id="form-data" method="get">
                                    <div class="row gy-2 gx-1 align-items-center text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
                                        <div class="col-md-1">
                                            <div class="">
                                                <label class="title-color mb-0" for="exampleInputEmail1">{{\App\CPU\translate('Seller')}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <select
                                                    class="js-select2-custom form-control text-ellipsis"
                                                    name="seller_id">
                                                    <option value="all" {{ $seller_id == 'all' ? 'selected' : '' }}>{{\App\CPU\translate('All')}}</option>
                                                    <option value="in_house" {{ $seller_id == 'in_house' ? 'selected' : '' }}>{{\App\CPU\translate('In-House')}}</option>
                                                    @foreach(\App\Model\Seller::where(['status'=>'approved'])->get() as $seller)
                                                        <option value="{{ $seller['id'] }}" {{ $seller_id == $seller['id'] ? 'selected' : '' }}>
                                                            {{$seller['f_name']}} {{$seller['l_name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="">
                                                <label for="exampleInputEmail1" class="title-color mb-0">{{\App\CPU\translate('Sort')}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <select
                                                    class="form-control"
                                                    name="sort">
                                                    <option value="ASC" {{ $sort == 'ASC' ? 'selected' : '' }}>{{\App\CPU\translate('wishlist_sort_by_(low_to_high)')}}</option>
                                                    <option value="DESC" {{ $sort == 'DESC' ? 'selected' : '' }}>{{\App\CPU\translate('wishlist_sort_by_(high_to_low)')}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn--primary btn-block" onclick="formUrlChange(this)" data-action="{{ url()->current() }}">
                                                {{\App\CPU\translate('Filter')}}
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <button type="button" class="btn btn-outline--primary text-nowrap btn-block" data-toggle="dropdown">
                                                    <i class="tio-download-to"></i>
                                                    {{ \App\CPU\translate('export') }}
                                                    <i class="tio-chevron-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a class="dropdown-item" href="{{route('admin.stock.wishlist-product-export')}}?search={{$search}}">Excel</a></li>
                                                    <div class="dropdown-divider"></div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive" id="products-table">
                        <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th>{{\App\CPU\translate('SL')}}</th>
                                <th>
                                    {{\App\CPU\translate('Product Name')}}
                                </th>
                                <th>
                                    {{\App\CPU\translate('Date')}}
                                </th>
                                <th class="text-center">
                                    {{\App\CPU\translate('Total in Wishlist')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=>$data)
                                <tr>
                                    <td>{{$products->firstItem()+$key}}</td>
                                    <td>{{ $data['name'] }}</td>
                                    <td>{{ date('d M Y', $data['created_at'] ? strtotime($data['created_at']) : null) }}</td>
                                    <td class="text-center">{{ $data->wish_list->count() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-center justify-content-md-end">
                            <!-- Pagination -->
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Stats -->
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.js-select2-custom').select2();
        });
    </script>
@endpush
