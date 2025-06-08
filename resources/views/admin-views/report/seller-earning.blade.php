@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Earning Report'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="{{asset('/public/assets/back-end/img/earning_report.png')}}" alt="">
                {{\App\CPU\translate('Earning_Reports')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        @include('admin-views.report.earning-report-inline-menu')
        <!-- End Inlile Menu -->

        
        <div class="card mb-2">
            <div class="card-body">
                <form action="#" id="form-data" method="GET">
                    <h4 class="mb-3">Search Data</h4>
                    <div class="row  gy-3 gx-2 align-items-center text-left">
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
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn--primary px-4 w-100">
                                Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
         <div class="store-report-content mb-2">
            <div class="left-content">
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/stores.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">23,453</h4>
                        <h6 class="subtext">Total Seller</h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/cart.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">33,453
                        </h4>
                        <h6 class="subtext">Total Seller Products</h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex justify-content-between">
                        <div>
                            <strong class="text-danger">43</strong>
                            <div>Rejected</div>
                        </div>
                        <div>
                            <strong class="text-primary">410</strong>
                            <div>Pending Request</div>
                        </div>
                        <div>
                            <strong class="text-success">33,000</strong>
                            <div>
                                Active Product
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/total-earning.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">
                            33,453
                        </h4>
                        <h6 class="subtext">Total Earning</h6>
                    </div>
                </div>
            </div>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title">Earning Statistics</h3>
                    <h5 class="subtitle">Average Earning Value : $456.98
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
                            <span>Seller Wallet Status</span>
                        </h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="position-relative pie-chart">
                            <div id="dognut-pie"></div>
                            <!-- Total Orders -->
                            <div class="total--orders">
                                <h3>$ 1.6M+</h3>
                                <span>Wallet Amount</span>
                            </div>
                            <!-- Total Orders -->
                        </div>
                        <div class="apex-legends">
                            <div class="before-bg-004188">
                                <span>Withdrawble Balance ($56M)
                                    (97)</span>
                            </div>
                            <div class="before-bg-0177CD">
                                <span>Pending Withdraws ($ 400.5k)</span>
                            </div>
                            <div class="before-bg-A2CEEE">
                                <span>Already Withdrawn ($75,439)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dognut Pie -->
            </div>
        </div>

        
        <div class="card">
            <div class="card-header border-0">
                <div class="w-100 d-flex flex-wrap gap-3 align-items-center">
                    <h4 class="mb-0 mr-auto">
                        {{\App\CPU\translate('Total Sales')}}
                    </h4>
                    <form action="" method="GET" class="mb-0">
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="datatableSearch_" type="search" name="search" class="form-control" placeholder="{{ \App\CPU\translate('Search by sores')}}" aria-label="Search orders" required>
                            <button type="submit" class="btn btn--primary">{{ \App\CPU\translate('search')}}</button>
                        </div>
                        <!-- End Search -->
                    </form>
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block"
                                data-toggle="dropdown">
                            <i class="tio-download-to"></i>
                            {{\App\CPU\translate('Export')}}
                            <i class="tio-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item" href="#0">{{\App\CPU\translate('Excel')}}</a>
                            </li>
                            <div class="dropdown-divider"></div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="datatable"
                        style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                        class="table __table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th>{{\App\CPU\translate('SL')}}</th>
                        <th>{{\App\CPU\translate('Seller Info')}}</th>
                        <th>{{\App\CPU\translate('Earn From Order')}}</th>
                        <th>{{\App\CPU\translate('Earn From Shipping')}}</th>
                        <th>{{\App\CPU\translate('Commission Given')}}</th>
                        <th>{{\App\CPU\translate('Discount Given')}}</th>
                        <th>{{\App\CPU\translate('Tax Given')}}</th>
                        <th>{{\App\CPU\translate('Total Earning')}}</th>
                        <th>{{\App\CPU\translate('Withdrawable Balance')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <div>
                                    <h6 class="mb-1">
                                        Brooklyn Simmons
                                    </h6>
                                    <div class="rating">
                                        <i class="tio-star"></i>4.2
                                    </div>
                                </div>
                            </td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                <div>
                                    <h6 class="mb-1">
                                        Brooklyn Simmons
                                    </h6>
                                    <div class="rating">
                                        <i class="tio-star"></i>4.2
                                    </div>
                                </div>
                            </td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                <div>
                                    <h6 class="mb-1">
                                        Brooklyn Simmons
                                    </h6>
                                    <div class="rating">
                                        <i class="tio-star"></i>4.2
                                    </div>
                                </div>
                            </td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                            <td>$ 687.93</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection

@push('script')

@endpush

@push('script_2')


<!-- Chart JS -->
    <script src="{{ asset('public/assets/back-end') }}/js/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('public/assets/back-end') }}/js/chart.js.extensions/chartjs-extensions.js"></script>
    <script src="{{ asset('public/assets/back-end') }}/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
    </script>
<!-- Chart JS -->

    <!-- Apex Charts -->
    <script src="{{ asset('/public/assets/back-end/js/apexcharts.js') }}"></script>
    <!-- Apex Charts -->


    <script>
        $('#from_date,#to_date').change(function () {
            let fr = $('#from_date').val();
            let to = $('#to_date').val();
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



    <!-- Dognut Pie Chart -->
    <script>
        var options = {
            series: [100, 200, 300],
            chart: {
                width: 320,
                type: 'donut',
            },
            labels: ['Withdrawble Balance ($56M)',
            'Already Withdrawn ($75,439)',
                'Pending Withdraws ($ 400.5k)'
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
