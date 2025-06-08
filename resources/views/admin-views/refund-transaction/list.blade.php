@extends('layouts.back-end.app')

@section('title',\App\CPU\translate('refund_transactions'))

@section('content')
    <div class="content container-fluid ">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20ss" src="{{asset('/public/assets/back-end/img/refund_transaction.png')}}" alt="">
                {{ \App\CPU\translate('refund_transaction_table')}}
                <span class="badge badge-soft-dark radius-50 fz-14">{{$refund_transactions->total()}}</span>
            </h2>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-header">
                <form action="{{ url()->current() }}" method="GET">
                    <!-- Search -->
                    <div class="input-group input-group-merge input-group-custom">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tio-search"></i>
                            </div>
                        </div>
                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                               placeholder="{{ \App\CPU\translate('Search by orders id _or_refund_id')}}" aria-label="Search orders"
                               value="{{ $search }}">
                        <button type="submit" class="btn btn--primary">{{ \App\CPU\translate('search')}}</button>
                    </div>
                    <!-- End Search -->
                </form>
            </div>

            <div class="table-responsive">
                <table id="datatable"
                       style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th>{{\App\CPU\translate('SL')}}</th>
                        <th>{{\App\CPU\translate('refund_id')}}</th>
                        <th>{{\App\CPU\translate('order_id')}}</th>
                        <th>{{ \App\CPU\translate('payment_method') }}</th>
                        <th>{{\App\CPU\translate('payment_status')}}</th>
                        <th>{{\App\CPU\translate('amount')}}</th>
                        <th class="text-center">{{\App\CPU\translate('transaction_type')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($refund_transactions as $key=>$refund_transaction)
                        <tr class="text-capitalize">
                            <td>
                                {{$refund_transactions->firstItem()+$key}}
                            </td>
                            <td>
                                @if ($refund_transaction->refund_id)
                                    <a href="{{route('admin.refund-section.refund.details',['id'=>$refund_transaction['refund_id']])}}" class="title-color hover-c1">
                                        {{$refund_transaction->refund_id}}
                                    </a>
                                @else
                                    <span>{{\App\CPU\translate('not_found')}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.orders.details',['id'=>$refund_transaction->order_id])}}" class="title-color hover-c1">
                                    {{$refund_transaction->order_id}}
                                </a>
                            </td>

                            <td>
                                {{\App\CPU\translate(str_replace('_',' ',$refund_transaction->payment_method))}}
                            </td>
                            <td>
                                {{\App\CPU\translate(str_replace('_',' ',$refund_transaction->payment_status))}}
                            </td>
                            <td>
                                {{\App\CPU\Helpers::currency_converter($refund_transaction->amount)}}
                            </td>
                            <td class="text-center">
                                {{\App\CPU\translate(str_replace('_',' ',$refund_transaction->transaction_type))}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($refund_transactions)==0)
                    <div class="text-center p-4">
                        <img class="mb-3 w-160" src="{{asset('public/assets/back-end')}}/svg/illustrations/sorry.svg"
                             alt="Image Description">
                        <p class="mb-0">{{ \App\CPU\translate('No_data_to_show')}}</p>
                    </div>
                @endif
            </div>

            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    <!-- Pagination -->
                    {{$refund_transactions->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
