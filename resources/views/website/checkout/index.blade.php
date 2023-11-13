@extends('website.master')

@section('body')

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>CheckOut</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">CheckOut</li>
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
                    <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form action="{{route('customer.login')}}" method="post">
                                    @csrf
                                    <p class="text-left text-danger">{{session('message')}}</p>
                                    <div class="form-group mb-3">
                                        <label>Email/Mobile</label>
                                        <input type="text" name="email_mobile" required="" class="form-control" id="reg_email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" required="" type="password" name="password">
                                    </div>
                                    <div class="login_footer form-group mb-3">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="button">
                                        <button type="submit" class="btn btn-fill-out btn-block">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fas fa-tag"></i>Have a coupon? <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                        </div>
                        <div class="panel-collapse collapse coupon_form" id="coupon">
                            <div class="panel-body">
                                <p>If you have a coupon code, please apply it below.</p>
                                <div class="coupon field_form input-group">
                                    <input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
                                    <div class="input-group-append">
                                        <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1">
                            <h4>Order Checkout Information</h4>
                        </div>
                        <form action="{{route('new-order')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Full Name</label>
                                @if(isset($customer->name))
                                <input type="text" value="{{$customer->name}}" readonly class="form-control" name="name" placeholder="Full Name">
                                @else
                                    <input type="text" placeholder="Full Name"/>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Email Address</label>
                                @if(isset($customer->email))
                                <input type="email" value="{{$customer->email}}" readonly class="form-control" name="email" placeholder="Email Address">
                                @else
                                <input type="email" placeholder="Email Address" name="email"/>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone Number</label>
                                @if(isset($customer->mobile))
                                <input  class="form-control" value="{{$customer->mobile}}" readonly type="number" name="mobile" placeholder="Phone Number">
                                @else
                                <input type="number" name="mobile" placeholder="Phone Number">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Delivery Address</label>
                                <textarea class="form-control" required name="delivery_address" placeholder="Delivery Address"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                    <label class="me-5">Payment Method</label>
                                    <label><input type="radio" name="payment_type" checked value="cash">Cash On Delivery</label>
                                    <label><input type="radio" name="payment_type" value="online">Online</label>
                            </div>
                            <hr>
{{--                            <div class="form-group mb-3">--}}
{{--                                <div class="chek-form">--}}
{{--                                    <div class="custome-checkbox">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">--}}
{{--                                        <label class="form-check-label label_info" for="createaccount"><span>Create an account?</span></label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group create-account mb-3">--}}
{{--                                <input class="form-control" required type="password" placeholder="Password" name="password" >--}}
{{--                            </div>--}}


                            <div class="form-group">
                                <div class="button-box">
                                    <button class="btn btn-fill-out" type="submit" >Place Order</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($sum=0)
                                    @foreach(Cart::content() as $cartItem)
                                    <tr>
                                        <td>{{$cartItem->name}} <span class="product-qty"> x {{$cartItem->qty}} </span></td>
                                        <td>{{round($cartItem->subtotal)}}</td>
                                    </tr>
                                     @php($sum += $cartItem->subtotal)
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">{{$sum}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tax Amount(35%)</th>
                                        <td>{{$tax = $sum*0.35}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Cost</th>
                                        <td>{{$shipping = 100}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal">{{$total = $sum + $tax + $shipping}}</td>
                                        <?php
                                        Session::put('order_total', round($total));
                                        Session::put('tax_total', round($tax));
                                        Session::put('shipping_total', round($shipping));
                                        ?>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
{{--                            <div class="payment_method">--}}
{{--                                <div class="heading_s1">--}}
{{--                                    <h4>Payment</h4>--}}
{{--                                </div>--}}
{{--                                <div class="payment_option">--}}
{{--                                    <div class="custome-radio">--}}
{{--                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">--}}
{{--                                        <label class="form-check-label" for="exampleRadios3">Direct Bank Transfer</label>--}}
{{--                                        <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="custome-radio">--}}
{{--                                        <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios4" value="option4">--}}
{{--                                        <label class="form-check-label" for="exampleRadios4">Check Payment</label>--}}
{{--                                        <p data-method="option4" class="payment-text">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="custome-radio">--}}
{{--                                        <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" value="option5">--}}
{{--                                        <label class="form-check-label" for="exampleRadios5">Paypal</label>--}}
{{--                                        <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-fill-out btn-block">Place Order</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

@endsection

