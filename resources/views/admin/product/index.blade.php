@extends('layouts.app')
@section('body')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product Module</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <h4 class="card-title">All Product Information</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">SL NO</th>
                            <th class="wd-15p border-bottom-0">Product Name</th>
                            <th class="wd-20p border-bottom-0">Product Image</th>
                            <th class="wd-20p border-bottom-0">Product category</th>
                            <th class="wd-15p border-bottom-0">Stock Amount</th>
                            <th class="wd-15p border-bottom-0">Product Status</th>
                            <th class="wd-10p border-bottom-0">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <img src="{{asset($product->image)}}" alt="" height="50" width="70">
                                </td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->stock_amount}}</td>
                                <td>
                                    @if ($product->product_status == 1)
                                        New Arrival
                                    @elseif ($product->product_status == 2)
                                        Best Sellers
                                    @elseif ($product->product_status == 3)
                                        Featured
                                    @elseif ($product->product_status == 4)
                                        Special Offer

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.show', $product->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-book"></i>
                                    </a>
                                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('product.destroy',$product->id)}}" id="deleteForm{{$product->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-id="{{$product->id}}"  class="btn btn-danger btn-sm delete-btn">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
