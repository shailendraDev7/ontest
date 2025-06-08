@extends('layouts.back-end.app-seller')

@section('content')
    <div class="content container-fluid ">
        <!-- Page Title -->
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="{{asset('/public/assets/back-end/img/order_report.png')}}" alt="">
                {{\App\CPU\translate('transaction_report')}}
                <span class="badge badge-soft-dark radius-50 fz-12">10</span>
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        @include('seller-views.transaction.transaction-report-inline-menu')
        <!-- End Inlile Menu -->

        <div class="card">
            <div class="px-3 py-4">
                <div class="row gy-2">
                    <div class="col-xl-3">
                        <form action="" method="GET">
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-custom">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch_" type="search" name="search" class="form-control"
                                       placeholder="{{ \App\CPU\translate('Search by orders id or transaction id')}}"
                                       aria-label="Search orders"
                                       value=""
                                       required>
                                <button type="submit"
                                        class="btn btn--primary">{{ \App\CPU\translate('search')}}</button>
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                    <div class="col-xl-9">
                        <form action="#" id="form-data" method="GET">
                            <div
                                class="row  gy-2 align-items-center text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
                                <div class="col-md-3">
                                    <div class="">
                                        <select class="js-select2-custom form-control" name="customer_id">
                                            <option class="text-center" value="0">
                                                ---{{\App\CPU\translate('select_customer')}}---
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                        <input type="date" name="from" value="" id="from_date"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                        <input type="date" value="" name="to" id="to_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-end gap-2">
                                    <button type="submit" class="btn btn--primary px-4" onclick="formUrlChange(this)"
                                            data-action="{{ url()->current() }}">
                                        {{\App\CPU\translate('filter')}}
                                    </button>
                                    <div>
                                        <button type="button" class="btn btn--primary text-nowrap btn-block"
                                                data-toggle="dropdown">
                                            <i class="tio-download-to"></i>
                                            {{\App\CPU\translate('Export')}}
                                            <i class="tio-chevron-down"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a class="dropdown-item"
                                                   href="{{ route('admin.transaction.transaction-export', ['customer_id'=>request('customer_id'), 'status'=>request('status'), 'from'=>request('from'), 'to'=>request('to')]) }}"  >{{\App\CPU\translate('Excel')}}</a>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="datatable"
                       style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th>{{\App\CPU\translate('SL')}}</th>
                        <th>{{\App\CPU\translate('seller_name')}}</th>
                        <th>{{\App\CPU\translate('customer_name')}}</th>
                        <th>{{\App\CPU\translate('order_id')}}</th>
                        <th>{{\App\CPU\translate('transaction_id')}}</th>
                        <th>{{\App\CPU\translate('order_amount')}}</th>
                        <th>{{ \App\CPU\translate('seller_amount') }}</th>
                        <th>{{\App\CPU\translate('admin_commission')}}</th>
                        <th>{{\App\CPU\translate('received_by')}}</th>
                        <th>{{\App\CPU\translate('delivered_by')}}</th>
                        <th>{{\App\CPU\translate('delivery_charge')}}</th>
                        <th>{{\App\CPU\translate('payment_method')}}</th>
                        <th>{{\App\CPU\translate('tax')}}</th>
                        <th>{{\App\CPU\translate('date')}}</th>
                        <th>{{\App\CPU\translate('status')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.js-select2-custom').select2();
        });

        $('#from_date,#to_date').change(function () {
            let fr = $('#from_date').val();
            let to = $('#to_date').val();
            if (fr != '') {
                $('#to_date').attr('required', 'required');
            }
            if (to != '') {
                $('#from_date').attr('required', 'required');
            }
            if (fr != '' && to != '') {
                if (fr > to) {
                    $('#from_date').val('');
                    $('#to_date').val('');
                    toastr.error('{{\App\CPU\translate('Invalid date range')}}!', Error, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            }

        })
    </script>
@endpush
