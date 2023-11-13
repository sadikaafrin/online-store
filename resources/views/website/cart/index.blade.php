@extends('website.master')

@section('body')

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Shopping Cart</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Shopping Cart</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center">{{session('message')}}</p>
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sum=0)
                                @foreach($products as $product)
                                <tr>
                                    <td class="product-thumbnail"><a href=""><img src="{{asset($product->options->image)}}" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product">
                                        <a href="">{{$product->name}}</a>
                                        <p class="product-des">
                                            <span><em>Category:</em>{{($product->options->category)}}</span><br>
                                            <span><em>Brand:</em> {{($product->options->brand)}}</span>
                                        </p>
                                    </td>

                                    <td class="product-price" data-title="Price">{{$product->price}}</td>

                                    <form action="{{route('cart.update', ['rowId' => $product->rowId])}}" method="POST">
                                        @csrf
                                        <div class="col-lg-8 col-md-6  text-start  text-md-end">
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="button" value="-" class="minus">
                                                    <input type="text" name="qty" min="1" value="{{$product->qty}}" title="Qty" class="qty" size="4">
                                                    <input type="button" value="+" class="plus">
                                                    <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
                                                </div>
                                            </td>

                                        </div>
                                    </form>
                                    <td class="product-subtotal" data-title="Total">{{round($product->subtotal)}}</td>

                                    <td class="product-remove" data-title="Remove" onclick="return confirm('Are yoe sure to delete?')"><a href="{{route('cart.close', ['rowId' => $product->rowId])}}"><i class="ti-close"></i></a></td>
                                </tr>
                                    @php($sum = $sum + $product->subtotal)
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6" class="px-0">
                                        <div class="row g-0 align-items-center">

                                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                                <div class="coupon field_form input-group">
                                                    <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-3">
                            <h6>Calculate Shipping</h6>
                        </div>
                        <form class="field_form shipping_calculator">
                            <div class="form-row">
                                <div class="form-group col-lg-12 mb-3">
                                    <div class="custom_select">
                                        <select class="form-control">
                                            <option value="">Choose a option...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6 mb-3">
                                    <input required="required" placeholder="State / Country" class="form-control" name="name" type="text">
                                </div>
                                <div class="form-group col-lg-6 mb-3">
                                    <input required="required" placeholder="PostCode / ZIP" class="form-control" name="name" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12 mb-3">
                                    <button class="btn btn-fill-line" type="submit">Update Totals</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="border p-3 p-md-4">
                            <div class="heading_s1 mb-3">
                                <h6>Cart Totals</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="cart_total_label">Cart Subtotal</td>
                                        <td class="cart_total_amount">
                                            {{$sum}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Tax Amount(35%)</td>
                                        <td class="cart_total_amount">{{$tax = round($sum*0.35)}}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Shipping Cost</td>
                                        <td class="cart_total_amount">{{$sipping=100}}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount"><strong>{{$total = $sum + $tax + $sipping}}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{route('checkout')}}" class="btn" style="background-color: #00aff0">Proceed To CheckOut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h3>Subscribe Our Newsletter</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->
@endsection
