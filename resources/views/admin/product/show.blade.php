@extends('layouts.app')
@section('body')
{{--    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>--}}
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
                    <h4 class="card-title">Product Detail Information</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <tr>
                            <th>Product Id</th>
                            <td>{{$product->id}}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr>
                            <th>Product Code</th>
                            <td>{{$product->code}}</td>
                        </tr>
                        <tr>
                            <th>Product Category</th>
                            <td>{{$product->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Product Sub Category</th>
                            <td>{{$product->subCategory->name}}</td>
                        </tr>
                        <tr>
                            <th>Product Brand</th>
                            <td>{{$product->brand->name}}</td>
                        </tr>
                        <tr>
                            <th>Product Unit</th>
                            <td>{{$product->unit->name}}</td>
                        </tr>
                        <tr>
                            <th>Product Price</th>
                            <td><b>Regular Price</b> {{$product->regular_price}}, <b>Selling Price</b> {{$product->selling_price}}</td>
                        </tr>
                        <tr>
                            <th>Stock Amount</th>
                            <td>{{$product->stock_amount}}</td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <td>{{$product->short_description}}</td>
                        </tr>
                        <tr>
                            <th>Long Description</th>
                            <td>{!! $product->long_description !!}</td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <td>
                                <img src="{{asset($product->image)}}" alt="" height="150" width="180">
                            </td>
                        </tr>
                        <tr>
                            <th>Product Trending Status</th>
                            <td>{{$product->trending_status}}</td>
                        </tr>
                        <tr>
                            <th>Product Sales Count</th>
                            <td>{{$product->sales_count}}</td>
                        </tr>
                        <tr>
                            <th>Product Total View</th>
                            <td>{{$product->hit_count}}</td>
                        </tr>

                        <tr>
                            <th>Product Status</th>
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
                        </tr>

{{--                        <tr>--}}
{{--                            <th>Product Publication Status</th>--}}
{{--                            <td>{{$product->publication_status}}</td>--}}
{{--                        </tr>--}}
                        <tr>
                            <th>Product Other Image</th>
                            <td>
                                @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" alt="" height="150" width="180">
                                @endforeach
                            </td>
                        </tr>
                    </table>
{{--                    <script>--}}
{{--                        $('#summernote').summernote({--}}
{{--                            tabsize: 2,--}}
{{--                            height: 220,--}}
{{--                        });--}}
{{--                    </script>--}}
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

