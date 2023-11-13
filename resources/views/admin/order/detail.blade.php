@extends('layouts.app')
@section('body')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Order Module</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Order Detail</li>
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
                    <h4 class="card-title">Order Basic Information</h4>
                    <table  class="table table-bordered dt-responsive  nowrap w-100">
                        <tr>
                            <th>Order Id</th>
                            <td>{{$order->id}}</td>
                        </tr>
                        <tr>
                            <th>Customer Info</th>
                            <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{$order->order_total}}</td>
                        </tr>
                        <tr>
                            <th>Tax Total</th>
                            <td>{{$order->tax_total}}</td>
                        </tr>
                        <tr>
                            <th>Shipping Total</th>
                            <td>{{$order->shipping_total}}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{$order->order_date}}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{$order->order_status}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{$order->delivery_address}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <td>{{$order->delivery_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{$order->payment_method}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{$order->payment_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Amount</th>
                            <td>{{$order->payment_amount}}</td>
                        </tr>
                        <tr>
                            <th>Currency</th>
                            <td>{{$order->currency}}</td>
                        </tr>
                        <tr>
                            <th>Transaction Id</th>
                            <td>{{$order->transaction_id}}</td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Product Information</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">SL NO</th>
                            <th class="wd-15p border-bottom-0">Product Name</th>
                            <th class="wd-20p border-bottom-0">Product Price</th>
                            <th class="wd-15p border-bottom-0">Product Quantity</th>
                            <th class="wd-15p border-bottom-0">Total Price</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($order->orderDetail as $orderDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_qty}}</td>
                                <td>{{$orderDetail->product_qty * $orderDetail->product_price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

