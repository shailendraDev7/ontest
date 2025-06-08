@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Product Report'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2 align-items-center">
                <img width="20" src="{{asset('/public/assets/back-end/img/seller_sale.png')}}" alt="">
                {{\App\CPU\translate('product_report')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        @include('admin-views.report.product-report-inline-menu')
        <!-- End Inlile Menu -->

        <div class="card mb-2">
            <div class="card-body">
                <form action="#" id="form-data" method="GET">
                    <h4 class="mb-3">Search Data</h4>
                    <div class="row gx-2 gy-3 align-items-center text-left justify-content-end">
                        <div class="col-sm-6 col-md-3">
                            <select class="form-control __form-control">
                                <option>All Sellers</option>
                                <option>Active Sellers</option>
                                <option>Online Seller</option>
                                <option>Offline Seller</option>
                                <option>Banned Seller</option>
                            </select>
                        </div>
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
                                <input type="date" name="from" value="" id="from_date" class="form-control">
                                <label>Start Date</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-floating">
                                <input type="date" value="" name="to" id="to_date" class="form-control">
                                <label>End Date</label>
                            </div>
                        </div>
                        <div class="col-sm-12 text-end pt-0">
                            <button type="submit" class="btn btn--primary px-4 px-md-5">
                                Show Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="store-report-content mb-2">
            <div class="left-content">
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/cart.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">23,453</h4>
                        <h6 class="subtext">Total Earnings</h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex justify-content-between">
                        <div>
                            <strong class="text-danger">$543</strong>
                            <div>Rejected</div>
                        </div>
                        <div>
                            <strong class="text-primary">$3,000</strong>
                            <div>Pending</div>
                        </div>
                        <div>
                            <strong class="text-success">30,000</strong>
                            <div>
                                Active
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/products.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">33,453
                        </h4>
                        <h6 class="subtext">Total Product Sale</h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/stores.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">
                            33,453
                        </h4>
                        <h6 class="subtext">Total Discount Given</h6>
                    </div>
                </div>
            </div>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title">Sales Statistics</h3>
                    <h5 class="subtitle">Average Sales Value : $456.98
                    </h5>
                </div>
                <canvas id="updatingData" class="store-center-chart"
                    data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [2018, 2019, 2020, 2021, 2022],
                  "datasets": [{
                    "data": [2076 , 1068, 5076 , 3068, 4076],
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
            <div class="right-content">
                <!-- Dognut Pie -->
                <div class="card h-100 bg-white payment-statistics-shadow">
                    <div class="card-header border-0 ">
                        <h5 class="card-title">
                            <span>Top 5 Category Wise Sale</span>
                        </h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="position-relative pie-chart">
                            <div id="dognut-pie"></div>
                            <!-- Total Orders -->
                            <div class="total--orders">
                                <h3>$ 1.6M+
                                </h3>
                                <span>Completed <br> Payments</span>
                            </div>
                            <!-- Total Orders -->
                        </div>
                        <div class="apex-legends" style="max-width:240px">
                            <div class="before-bg-004188">
                                <span>Fruits ($56M)</span>
                            </div>
                            <div class="before-bg-0177CD">
                                <span>Meat & Fish ($ 400.5k)</span>
                            </div>
                            <div class="before-bg-A2CEEE">
                                <span>Dairy Needs ($75,439)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dognut Pie -->
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex flex-wrap w-100 gap-3 align-items-center">
                    <h4 class="mb-0 mr-auto">
                        Total Sales
                    </h4>
                    <form action="#" method="GET">
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
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block" data-toggle="dropdown">
                            <i class="tio-download-to"></i>
                            {{ \App\CPU\translate('Export') }}
                            <i class="tio-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a class="dropdown-item" href="{{ route('admin.stock.product-stock-export', ['seller_id' => request('seller_id'), 'sort' => request('sort')]) }}">{{\App\CPU\translate('excel')}}</a></li>
                            <div class="dropdown-divider"></div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" id="products-table">
                    <table class="table table-hover __table table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}">
                        <thead class="thead-light thead-50 text-capitalize">
                        <tr>
                            <th>{{\App\CPU\translate('SL')}}</th>
                            <th>
                                {{\App\CPU\translate('Product Name')}}
                            </th>
                            <th>
                                {{\App\CPU\translate('Product Unit Price')}}
                            </th>
                            <th>
                                {{\App\CPU\translate('Total Amount Sold')}}
                            </th>
                            <th>
                                {{\App\CPU\translate('Total Discount Given')}}
                            </th>
                            <th>
                                {{\App\CPU\translate('Average Product Value')}}
                            </th>
                            <th>
                                {{\App\CPU\translate('Current Stock Amount')}}
                            </th>
                            <th>
                                {{\App\CPU\translate('Average Ratings')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Orange</td>
                            <td>$624</td>
                            <td>$350,551</td>
                            <td>$815,463</td>
                            <td>$213</td>
                            <td>3242</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rating mr-1"><i class="tio-star"></i>4.2</div>
                                    <div>(100)</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- End Stats -->
    </div>
@endsection

@push('script')

    <!-- Chart JS -->
        <script src="{{ asset('public/assets/back-end') }}/js/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('public/assets/back-end') }}/js/chart.js.extensions/chartjs-extensions.js"></script>
        <script src="{{ asset('public/assets/back-end') }}/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
        </script>
    <!-- Chart JS -->

    <!-- Apex Charts -->
    <script src="{{ asset('/public/assets/back-end/js/apexcharts.js') }}"></script>
    <!-- Apex Charts -->

@endpush

@push('script_2')

    <!-- Dognut Pie Chart -->
    <script>
        var options = {
            series: [100, 200, 300],
            chart: {
                width: 320,
                type: 'donut',
            },
            labels: ['Fruits ($56M)',
            'Meat & Fish ($ 400.5k)',
                'Dairy Needs ($75,439)'
            ],
            dataLabels: {
                enabled: false,
                style: {
                    colors: ['#004188', '#004188', '#004188']
                }
            },
            responsive: [{
                breakpoint: 1650,
                options: {
                    chart: {
                        width: 260
                    },
                }
            }],
            colors: ['#004188', '#0177CD', '#0177CD'],
            fill: {
                colors: ['#004188', '#A2CEEE', '#0177CD']
            },
            legend: {
                show: false
            },
        };

        var chart = new ApexCharts(document.querySelector("#dognut-pie"), options);
        chart.render();
    </script>
    <!-- Dognut Pie Chart -->

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
