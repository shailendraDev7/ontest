@extends('layouts.back-end.app-seller')

@section('title', \App\CPU\translate('Order Report'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="{{asset('/public/assets/back-end/img/order_report.png')}}" alt="">
                {{\App\CPU\translate('Order_Report')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <div class="card mb-3">
            <div class="card-body">
                <div class="media align-items-center gap-3">
                    <div class="avatar avatar-xl">
                        <img class="avatar-img" src="{{asset('public/assets/back-end')}}/svg/illustrations/order.png"
                            alt="Image Description">
                    </div>

                    <div class="media-body">
                        <div class="row align-items-center">
                            <div class="col-md mb-1 mb-md-0 d-block"
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                <div>
                                    <h1 class="page-header-title">{{\App\CPU\translate('Order')}} {{\App\CPU\translate('Report')}}  {{\App\CPU\translate('Overview')}}</h1>
                                </div>

                                <div class="row align-items-center">
                                    <div class="d-flex col-auto">
                                        <h5 class="text-muted {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}">{{\App\CPU\translate('Admin')}}
                                            :</h5>
                                        <h5 class="text-muted"></h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex gap-2 flex-wrap align-items-center">
                                            <h5 class="text-muted">{{\App\CPU\translate('Date')}}</h5>

                                            <h5 class="text-muted">( {{session('from_date')}} - {{session('to_date')}}
                                                )</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-auto">
                                <div class="d-flex">
                                    <a class="btn btn-icon btn--primary rounded-circle" href="">
                                        <i class="tio-home-outlined"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{route('seller.report.set-date')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2 d-flex">
                                        <label for="exampleInputEmail1"
                                            class="title-color">{{\App\CPU\translate('Show data by date range')}}</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <input type="date" value="{{date('Y-m-d',strtotime(session('from_date')))}}" name="from" id="from_date"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <input type="date" name="to" value="{{date('Y-m-d',strtotime(session('to_date')))}}" id="to_date"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <button type="submit"
                                                class="btn btn--primary btn-block">{{\App\CPU\translate('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @php
                $from = session('from_date');
                $to = session('to_date');
                $total=\App\Model\Order::where('order_type','default_type')->whereBetween('created_at', [$from, $to])->count();
                if($total==0){
                   $total=.01;
                }
            @endphp
            <div class="col-sm-6 col-lg-3 mb-3">
                @php
                    $delivered=\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'delivered'])->whereBetween('created_at', [$from, $to])->count()
                @endphp
                <!-- Card -->
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <!-- Media -->
                                <div class="media">
                                    <i class="tio-shopping-cart nav-icon {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}"></i>

                                    <div class="media-body {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}">
                                        <h4 class="mb-1">{{\App\CPU\translate('Delivered')}}</h4>
                                        <span class="font-size-sm text-success">
                                          <i class="tio-trending-up"></i> {{$delivered}}
                                        </span>
                                    </div>
                                </div>
                                <!-- End Media -->
                            </div>

                            <div class="col-auto">
                                <!-- Circle -->
                                <div class="js-circle"
                                     data-hs-circles-options='{
                                       "value": {{round(($delivered/$total)*100)}},
                                       "maxValue": 100,
                                       "duration": 2000,
                                       "isViewportInit": true,
                                       "colors": ["#e7eaf3", "green"],
                                       "radius": 25,
                                       "width": 3,
                                       "fgStrokeLinecap": "round",
                                       "textFontSize": 14,
                                       "additionalText": "%",
                                       "textClass": "circle-custom-text",
                                       "textColor": "green"
                                     }'></div>
                                <!-- End Circle -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                @php
                    $returned=\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'returned'])->whereBetween('created_at', [$from, $to])->count()
                @endphp
                <!-- Card -->
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <!-- Media -->
                                <div class="media">
                                    <i class="tio-shopping-cart-off nav-icon {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}"></i>

                                    <div class="media-body {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}">
                                        <h4 class="mb-1">{{\App\CPU\translate('Returned')}}</h4>
                                        <span class="font-size-sm text-warning">
                                          <i class="tio-trending-up"></i> {{$returned}}
                                        </span>
                                    </div>
                                </div>
                                <!-- End Media -->
                            </div>

                            <div class="col-auto">
                                <!-- Circle -->
                                <div class="js-circle"
                                     data-hs-circles-options='{
                           "value": {{round(($returned/$total)*100)}},
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "colors": ["#e7eaf3", "#ec9a3c"],
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circle-custom-text",
                           "textColor": "#ec9a3c"
                         }'></div>
                                <!-- End Circle -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                @php
                    $failed=\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'failed'])->whereBetween('created_at', [$from, $to])->count()
                @endphp
                <!-- Card -->
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <!-- Media -->
                                <div class="media">
                                    <i class="tio-message-failed nav-icon {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}"></i>

                                    <div class="media-body {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}">
                                        <h4 class="mb-1">{{\App\CPU\translate('Failed To Deliver')}}</h4>
                                        <span class="font-size-sm text-danger">
                                          <i class="tio-trending-up"></i> {{$failed}}
                                        </span>
                                    </div>
                                </div>
                                <!-- End Media -->
                            </div>

                            <div class="col-auto">
                                <!-- Circle -->
                                <div class="js-circle"
                                     data-hs-circles-options='{
                           "value": {{round(($failed/$total)*100)}},
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "colors": ["#e7eaf3", "darkred"],
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circle-custom-text",
                           "textColor": "darkred"
                         }'></div>
                                <!-- End Circle -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                @php
                    $canceled=\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'processing'])->whereBetween('created_at', [$from, $to])->count()
                @endphp
                <!-- Card -->
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <!-- Media -->
                                <div class="media">
                                    <i class="tio-flight-cancelled nav-icon {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}"></i>

                                    <div class="media-body {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}">
                                        <h4 class="mb-1">{{\App\CPU\translate('Packaging')}}</h4>
                                        <span class="font-size-sm text-muted">
                                          <i class="tio-trending-up"></i> {{$canceled}}
                                        </span>
                                    </div>
                                </div>
                                <!-- End Media -->
                            </div>

                            <div class="col-auto">
                                <!-- Circle -->
                                <div class="js-circle"
                                     data-hs-circles-options='{
                           "value": {{round(($canceled/$total)*100)}},
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "colors": ["#e7eaf3", "gray"],
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circle-custom-text",
                           "textColor": "gray"
                         }'></div>
                                <!-- End Circle -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->

        <!-- Card -->
        <div class="card mb-3">
            <!-- Header -->
            <div class="card-header flex-wrap">
                @php
                    $from = \Carbon\Carbon::now()->startOfYear()->format('Y-m-d');
                    $to = \Carbon\Carbon::now()->endOfYear()->format('Y-m-d');
                    $total=\App\Model\Order::where('order_type','default_type')->whereBetween('created_at', [$from, $to])->count()
                @endphp
                <div class="flex-start">
                    <h6 class="card-subtitle mt-1">{{\App\CPU\translate('Total orders of')}} {{date('Y')}} : </h6>
                    <h6 class="h3 {{Session::get('direction') === "rtl" ? 'mr-sm-2' : 'ml-sm-2'}}">{{round($total)}}</h6>
                </div>

                <!-- Unfold -->
                <div class="hs-unfold">
                    <a class="js-hs-unfold-invoker btn btn-white"
                       href="{{route('seller.orders.list',['status'=>'all'])}}">
                        <i class="tio-shopping-cart-outlined {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i> {{\App\CPU\translate('Orders')}}
                    </a>
                </div>
                <!-- End Unfold -->
            </div>
            <!-- End Header -->

            @php
                $delivered=[];
                $from = \Carbon\Carbon::now()->startOfYear()->format('Y-m-d');
                $to = \Carbon\Carbon::now()->endOfYear()->format('Y-m-d');

                $data=\App\Model\Order::where('order_type','default_type')
                ->where(['order_status'=>'delivered'])->select(
                \Illuminate\Support\Facades\DB::raw('COUNT(id) as count'),
                \Illuminate\Support\Facades\DB::raw('YEAR(created_at) year, MONTH(created_at) month')
                )->whereBetween('created_at', [$from, $to])->groupby('year', 'month')->get()->toArray();

                for ($inc = 1; $inc <= 12; $inc++) {
                $delivered[$inc] = 0;
                foreach ($data as $match) {
                    if ($match['month'] == $inc) {
                        $delivered[$inc] = $match['count'];
                    }
                }
            }

            @endphp

            @php
                $ret=[];

                $from = \Carbon\Carbon::now()->startOfYear()->format('Y-m-d');
                $to = \Carbon\Carbon::now()->endOfYear()->format('Y-m-d');

                $data=\App\Model\Order::where('order_type','default_type')
                ->where(['order_status'=>'returned'])->select(
                \Illuminate\Support\Facades\DB::raw('COUNT(id) as count'),
                \Illuminate\Support\Facades\DB::raw('YEAR(created_at) year, MONTH(created_at) month')
                )->whereBetween('created_at', [$from, $to])->groupby('year', 'month')->get()->toArray();

                for ($inc = 1; $inc <= 12; $inc++) {
                $ret[$inc] = 0;
                foreach ($data as $match) {
                    if ($match['month'] == $inc) {
                        $ret[$inc] = $match['count'];
                    }
                }
            }
            @endphp

            @php
                $fai=[];

                $from = \Carbon\Carbon::now()->startOfYear()->format('Y-m-d');
                $to = \Carbon\Carbon::now()->endOfYear()->format('Y-m-d');

                $data=\App\Model\Order::where('order_type','default_type')
                ->where(['order_status'=>'failed'])->select(
                \Illuminate\Support\Facades\DB::raw('COUNT(id) as count'),
                \Illuminate\Support\Facades\DB::raw('YEAR(created_at) year, MONTH(created_at) month')
                )->whereBetween('created_at', [$from, $to])->groupby('year', 'month')->get()->toArray();

                for ($inc = 1; $inc <= 12; $inc++) {
                $fai[$inc] = 0;
                foreach ($data as $match) {
                    if ($match['month'] == $inc) {
                        $fai[$inc] = $match['count'];
                    }
                }
            }
            @endphp


            @php
                $can=[];

                $from = \Carbon\Carbon::now()->startOfYear()->format('Y-m-d');
                $to = \Carbon\Carbon::now()->endOfYear()->format('Y-m-d');

                $data=\App\Model\Order::where('order_type','default_type')
                ->where(['order_status'=>'processing'])->select(
                \Illuminate\Support\Facades\DB::raw('COUNT(id) as count'),
                \Illuminate\Support\Facades\DB::raw('YEAR(created_at) year, MONTH(created_at) month')
                )->whereBetween('created_at', [$from, $to])->groupby('year', 'month')->get()->toArray();

                for ($inc = 1; $inc <= 12; $inc++) {
                $can[$inc] = 0;
                foreach ($data as $match) {
                    if ($match['month'] == $inc) {
                        $can[$inc] = $match['count'];
                    }
                }
            }

            $max_order=\App\CPU\BackEndHelper::max_orders();
            @endphp

            <!-- Body -->
            <div class="card-body">
                <!-- Bar Chart -->
                <div class="chartjs-custom __h-18rem">
                    <canvas class="js-chart"
                            data-hs-chartjs-options='{
                        "type": "line",
                        "data": {
                           "labels": ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                           "datasets": [{
                            "data": [{{$delivered[1]}},{{$delivered[2]}},{{$delivered[3]}},{{$delivered[4]}},{{$delivered[5]}},{{$delivered[6]}},{{$delivered[7]}},{{$delivered[8]}},{{$delivered[9]}},{{$delivered[10]}},{{$delivered[11]}},{{$delivered[12]}}],
                            "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                            "borderColor": "green",
                            "borderWidth": 2,
                            "pointRadius": 0,
                            "pointBorderColor": "#fff",
                            "pointBackgroundColor": "green",
                            "pointHoverRadius": 0,
                            "hoverBorderColor": "#fff",
                            "hoverBackgroundColor": "#377dff"
                          },
                          {
                            "data": [{{$ret[1]}},{{$ret[2]}},{{$ret[3]}},{{$ret[4]}},{{$ret[5]}},{{$ret[6]}},{{$ret[7]}},{{$ret[8]}},{{$ret[9]}},{{$ret[10]}},{{$ret[11]}},{{$ret[12]}}],
                            "backgroundColor": ["rgba(0, 201, 219, 0)", "rgba(255, 255, 255, 0)"],
                            "borderColor": "#ec9a3c",
                            "borderWidth": 2,
                            "pointRadius": 0,
                            "pointBorderColor": "#fff",
                            "pointBackgroundColor": "#ec9a3c",
                            "pointHoverRadius": 0,
                            "hoverBorderColor": "#fff",
                            "hoverBackgroundColor": "#00c9db"
                          },
                          {
                            "data": [{{$fai[1]}},{{$fai[2]}},{{$fai[3]}},{{$fai[4]}},{{$fai[5]}},{{$fai[6]}},{{$fai[7]}},{{$fai[8]}},{{$fai[9]}},{{$fai[10]}},{{$fai[11]}},{{$fai[12]}}],
                            "backgroundColor": ["rgba(0, 201, 219, 0)", "rgba(255, 255, 255, 0)"],
                            "borderColor": "darkred",
                            "borderWidth": 2,
                            "pointRadius": 0,
                            "pointBorderColor": "#fff",
                            "pointBackgroundColor": "darkred",
                            "pointHoverRadius": 0,
                            "hoverBorderColor": "#fff",
                            "hoverBackgroundColor": "#00c9db"
                          },
                          {
                            "data": [{{$can[1]}},{{$can[2]}},{{$can[3]}},{{$can[4]}},{{$can[5]}},{{$can[6]}},{{$can[7]}},{{$can[8]}},{{$can[9]}},{{$can[10]}},{{$can[11]}},{{$can[12]}}],
                            "backgroundColor": ["rgba(0, 201, 219, 0)", "rgba(255, 255, 255, 0)"],
                            "borderColor": "gray",
                            "borderWidth": 2,
                            "pointRadius": 0,
                            "pointBorderColor": "#fff",
                            "pointBackgroundColor": "gray",
                            "pointHoverRadius": 0,
                            "hoverBorderColor": "#fff",
                            "hoverBackgroundColor": "#00c9db"
                          }]
                        },
                        "options": {
                          "gradientPosition": {"y1": 200},
                           "scales": {
                              "yAxes": [{
                                "gridLines": {
                                  "color": "#e7eaf3",
                                  "drawBorder": false,
                                  "zeroLineColor": "#e7eaf3"
                                },
                                "ticks": {
                                  "min": 0,
                                  "max": {{$max_order}},
                                  "stepSize": {{round($max_order/5)}},
                                  "fontColor": "#97a4af",
                                  "fontFamily": "Open Sans, sans-serif",
                                  "padding": 10,
                                  "postfix": ""
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
                                }
                              }]
                          },
                          "tooltips": {
                            "prefix": "",
                            "postfix": "",
                            "hasIndicator": true,
                            "mode": "index",
                            "intersect": false,
                            "lineMode": true,
                            "lineWithLineColor": "rgba(19, 33, 68, 0.075)"
                          },
                          "hover": {
                            "mode": "nearest",
                            "intersect": true
                          }
                        }
                      }'>
                    </canvas>
                </div>
                <!-- End Bar Chart -->
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->
    </div>
@endsection

@push('script')

@endpush

@push('script_2')

    <script src="{{asset('public/assets/back-end')}}/vendor/chart.js/dist/Chart.min.js"></script>
    <script
        src="{{asset('public/assets/back-end')}}/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/js/hs.chartjs-matrix.js"></script>

    <script>
        $(document).on('ready', function () {

            // INITIALIZATION OF FLATPICKR
            // =======================================================
            $('.js-flatpickr').each(function () {
                $.HSCore.components.HSFlatpickr.init($(this));
            });


            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            $('.js-nav-scroller').each(function () {
                new HsNavScroller($(this)).init()
            });


            // INITIALIZATION OF DATERANGEPICKER
            // =======================================================
            $('.js-daterangepicker').daterangepicker();

            $('.js-daterangepicker-times').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });

            var start = moment();
            var end = moment();

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
            }

            $('#js-daterangepicker-predefined').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);


            // INITIALIZATION OF CHARTJS
            // =======================================================
            $('.js-chart').each(function () {
                $.HSCore.components.HSChartJS.init($(this));
            });

            var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));

            // Call when tab is clicked
            $('[data-toggle="chart"]').click(function (e) {
                let keyDataset = $(e.currentTarget).attr('data-datasets')

                // Update datasets for chart
                updatingChart.data.datasets.forEach(function (dataset, key) {
                    dataset.data = updatingChartDatasets[keyDataset][key];
                });
                updatingChart.update();
            })


            // INITIALIZATION OF MATRIX CHARTJS WITH CHARTJS MATRIX PLUGIN
            // =======================================================
            function generateHoursData() {
                var data = [];
                var dt = moment().subtract(365, 'days').startOf('day');
                var end = moment().startOf('day');
                while (dt <= end) {
                    data.push({
                        x: dt.format('YYYY-MM-DD'),
                        y: dt.format('e'),
                        d: dt.format('YYYY-MM-DD'),
                        v: Math.random() * 24
                    });
                    dt = dt.add(1, 'day');
                }
                return data;
            }

            $.HSCore.components.HSChartMatrixJS.init($('.js-chart-matrix'), {
                data: {
                    datasets: [{
                        label: 'Commits',
                        data: generateHoursData(),
                        width: function (ctx) {
                            var a = ctx.chart.chartArea;
                            return (a.right - a.left) / 70;
                        },
                        height: function (ctx) {
                            var a = ctx.chart.chartArea;
                            return (a.bottom - a.top) / 10;
                        }
                    }]
                },
                options: {
                    tooltips: {
                        callbacks: {
                            title: function () {
                                return '';
                            },
                            label: function (item, data) {
                                var v = data.datasets[item.datasetIndex].data[item.index];

                                if (v.v.toFixed() > 0) {
                                    return '<span class="font-weight-bold">' + v.v.toFixed() + ' hours</span> on ' + v.d;
                                } else {
                                    return '<span class="font-weight-bold">No time</span> on ' + v.d;
                                }
                            }
                        }
                    },
                    scales: {
                        xAxes: [{
                            position: 'bottom',
                            type: 'time',
                            offset: true,
                            time: {
                                unit: 'week',
                                round: 'week',
                                displayFormats: {
                                    week: 'MMM'
                                }
                            },
                            ticks: {
                                "labelOffset": 20,
                                "maxRotation": 0,
                                "minRotation": 0,
                                "fontSize": 12,
                                "fontColor": "rgba(22, 52, 90, 0.5)",
                                "maxTicksLimit": 12,
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            type: 'time',
                            offset: true,
                            time: {
                                unit: 'day',
                                parser: 'e',
                                displayFormats: {
                                    day: 'ddd'
                                }
                            },
                            ticks: {
                                "fontSize": 12,
                                "fontColor": "rgba(22, 52, 90, 0.5)",
                                "maxTicksLimit": 2,
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }
            });


            // INITIALIZATION OF CLIPBOARD
            // =======================================================
            $('.js-clipboard').each(function () {
                var clipboard = $.HSCore.components.HSClipboard.init(this);
            });


            // INITIALIZATION OF CIRCLES
            // =======================================================
            $('.js-circle').each(function () {
                var circle = $.HSCore.components.HSCircles.init($(this));
            });
        });
    </script>

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
@endpush
