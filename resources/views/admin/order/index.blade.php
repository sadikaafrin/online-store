@extends('layouts.app')
@section('body')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Order Module</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Manage Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <h4 class="card-title">All Order Information</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">SL NO</th>
                            <th class="wd-15p border-bottom-0">Order Id</th>
                            <th class="wd-20p border-bottom-0">Customer Info</th>
                            <th class="wd-15p border-bottom-0">Order Date</th>
                            <th class="wd-15p border-bottom-0">Order Total</th>
                            <th class="wd-15p border-bottom-0">Order Status</th>
                            <th class="wd-10p border-bottom-0">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
{{--                                <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>--}}
{{--                                <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>--}}

                                <td>
                                    @if($order->customer)
                                        {{$order->customer->name.'('.$order->customer->mobile.')'}}
                                    @else
                                        Customer not found
                                    @endif
                                </td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>
                                    <a href="{{route('admin.order-detail', ['id' => $order->id])}}" class="btn btn-success btn-sm" title="Order Detail Info">
                                        <i class="fa fa-bookmark"></i>
                                    </a>
                                    <a href="{{route('admin.order-edit', ['id' => $order->id])}}" class="btn btn-info btn-sm {{$order->order_status == 'Complete' ? 'disabled' : ''}}" title="Edit Order">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.order-invoice', ['id' => $order->id])}}" class="btn btn-warning btn-sm" title="Order Invoice">
                                        <i class="fa fa-book"></i>
                                    </a>
                                    <a href="{{route('admin.download-order-invoice', ['id' => $order->id])}}" target="_blank" class="btn btn-success btn-sm" title="Print Invoice">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <a href="{{route('admin.order-delete', ['id' => $order->id])}}" onclick="return confirm('Are you sure to delete this?')" class="{{$order->order_status == 'Cancel' ? 'btn btn-danger btn-sm': 'disabled btn btn-danger btn-sm'}}" title="Delete Order">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
