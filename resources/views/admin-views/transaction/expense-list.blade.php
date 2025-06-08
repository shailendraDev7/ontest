@extends('layouts.back-end.app')

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
        @include('admin-views.report.transaction-report-inline-menu')
        <!-- End Inlile Menu -->

        <div class="card mb-2">
            <div class="card-body">
                <form action="#" id="form-data" method="GET">
                    <h4 class="mb-3">Search Data</h4>
                    <div class="row  gy-2 align-items-center text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
                        <div class="col-sm-6 col-md-3">
                            <select class="form-control __form-control">
                                <option>This Year</option>
                                <option>This Month</option>
                                <option>This Week</option>
                                <option>Custom Date</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-floating">
                                <input type="date" name="from" value="" id="from_date"
                                        class="form-control">
                                <label>Start Date</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-floating">
                                <input type="date" value="" name="to" id="to_date" class="form-control">
                                <label>End Date</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn--primary px-4 w-100" onclick="formUrlChange(this)"
                                    data-action="{{ url()->current() }}">
                                {{\App\CPU\translate('filter')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>

        
         <div class="store-report-content mb-2">
            <div class="left-content expense--content">
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/expense.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle"><sub>$</sub> 33,453</h4>
                        <h6 class="subtext">Total Expense</h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/free-delivery.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle"><sub>$</sub> 33,453</h4>
                        <h6 class="subtext">Free Delivery</h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/coupon-discount.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle"><sub>$</sub> 33,453</h4>
                        <h6 class="subtext">Coupon Discount</h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/inhouse-discount.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle"><sub>$</sub> 33,453</h4>
                        <h6 class="subtext">In-House Product Discount</h6>
                    </div>
                </div>
            </div>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title">Transaction Statistics</h3>
                </div>
                <canvas id="updatingData" class="store-center-chart"
                    data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [2016, 2017, 2018, 2019, 2020, 2021, 2022],
                  "datasets": [{
                    "data": [ 1068, 5076, 2076 , 1068, 5076 , 3068, 4076],
                    "backgroundColor": "#a2ceee",
                    "hoverBackgroundColor": "#0177cd",
                    "borderColor": "#a2ceee"
                  }]
                },
                "options": {
                  "scales": {
                    "yAxes": [{
                      "gridLines": {
                        "color": "#e7eaf3",
                        "drawBorder": false,
                        "zeroLineColor": "#e7eaf3"
                      },
                      "ticks": {
                        "beginAtZero": true,
                        "stepSize": 1000,
                        "fontSize": 12,
                        "fontColor": "#97a4af",
                        "fontFamily": "Open Sans, sans-serif",
                        "padding": 5,
                        "postfix": " $"
                      }
                    }],
                    "xAxes": [{
                      "gridLines": {
                        "display": false,
                        "drawBorder": false
                      },
                      "ticks": {
                        "fontSize": 12,
                        "fontColor": "#97a4af",
                        "fontFamily": "Open Sans, sans-serif",
                        "padding": 5
                      },
                      "categoryPercentage": 0.3,
                      "maxBarThickness": "10"
                    }]
                  },
                  "cornerRadius": 5,
                  "tooltips": {
                    "prefix": " ",
                    "hasIndicator": true,
                    "mode": "index",
                    "intersect": false
                  },
                  "hover": {
                    "mode": "nearest",
                    "intersect": true
                  }
                }
              }'>
                </canvas>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
                <div class="w-100 d-flex flex-wrap gap-3 align-items-center">
                    <form action="" method="GET" class="mr-auto">
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="datatableSearch_" type="search" name="search" class="form-control"
                                    placeholder="{{ \App\CPU\translate('Search by ID...')}}"
                                    aria-label="Search orders"
                                    value=""
                                    required>
                            <button type="submit"
                                    class="btn btn--primary">{{ \App\CPU\translate('search')}}</button>
                        </div>
                        <!-- End Search -->
                    </form>
                    <div>
                        <select class="form-control __form-control min-w-200">
                            <option>Expense Type</option>
                            <option>Expense Type</option>
                            <option>Expense Type</option>
                            <option>Expense Type</option>
                            <option>Expense Type</option>
                        </select>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block">
                            <i class="tio-file-text"></i>
                            {{\App\CPU\translate('Download PDF')}}
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block"
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
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="datatable"
                           style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                           class="table __table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize">
                        <tr>
                            <th>{{\App\CPU\translate('SL')}}</th>
                            <th>{{\App\CPU\translate('XID')}}</th>
                            <th>{{\App\CPU\translate('Transaction Date')}}</th>
                            <th>{{\App\CPU\translate('Order ID')}}</th>
                            <th>{{\App\CPU\translate('Expense Amount')}}</th>
                            <th>{{\App\CPU\translate('Expense Type')}}</th>
                            <th class="text-center">{{\App\CPU\translate('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>21423355</td>
                                <td>15 May 2020 9:30 am</td>
                                <td>100234</td>
                                <td>$ 687.93</td>
                                <td>Free Delivery</td>
                                <td>
                                <div class="d-flex justify-content-center">
                                        <a href="#0" class="btn btn-outline-success square-btn btn-sm">
                                            <i class="tio-download-to"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')

    <!-- Chart JS -->
        <script src="{{ asset('public/assets/back-end') }}/js/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('public/assets/back-end') }}/js/chart.js.extensions/chartjs-extensions.js"></script>
        <script src="{{ asset('public/assets/back-end') }}/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
        </script>
    <!-- Chart JS -->

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

@push('script_2')
    <script>
        // Bar Charts
        Chart.plugins.unregister(ChartDataLabels);

        $('.js-chart').each(function() {
            $.HSCore.components.HSChartJS.init($(this));
        });

        var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));

        $('.js-data-example-ajax').select2({
            ajax: {
                url: '{{ url('/') }}/admin/store/get-stores',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        // all:true,
                        @if (isset($zone))
                            zone_ids: [{{ $zone->id }}],
                        @endif
                        page: params.page
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                __port: function(params, success, failure) {
                    var $request = $.ajax(params);

                    $request.then(success);
                    $request.fail(failure);

                    return $request;
                }
            }
        });

    </script>
@endpush
