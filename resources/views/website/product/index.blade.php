@extends('website.master')

@section('body')

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Product Detail</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Product Detail</li>
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
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                <img id="product_img" src='{{asset($product->image)}}'  alt="product_img1" height="400" width="600"/>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                @foreach($product->otherImages as $otherImage)
                                <div class="item">
                                    <a href="#" class="product_gallery_item active" data-image="{{asset($otherImage->image)}}" data-zoom-image="{{asset($otherImage->image)}}">
                                        <img src="{{asset($otherImage->image)}}" alt="product_small_img1" height="150"/>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title">{{$product->name}}</h4>
                                <p class="categories-list">
                                    <i class="linearicons-tag"></i>
                                    Product Category :<a href="javascript:void (0)">{{$product->category->name}}</a>
                                </p>
                                <p class="categories-list">
                                    <i class="linearicons-tag"></i>
                                    Product Sub Category :<a href="javascript:void (0)">{{$product->subcategory->name}}</a>
                                </p>
                                <p class="categories-list">
                                    <i class="linearicons-tag"></i>
                                    Product Brand :<a href="javascript:void (0)">{{$product->brand->name}}</a>
                                </p>
                                <p class="categories-list">
                                    <i class="linearicons-tag"></i>
                                    Product Quantity :<a href="javascript:void (0)">{{$product->stock_amount}}</a>
                                </p>
                                <div class="product_price">
                                    <span class="price">{{$product->selling_price}}</span>
                                    <del>Tk. {{$product->regular_price}}</del>
{{--                                    <div class="on_sale">--}}
{{--                                        <span>35% Off</span>--}}
{{--                                    </div>--}}

                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_desc">
                                    <p>{{$product->short_description}}</p>
                                </div>
                                <div class="product_sort_info">
                                    <ul>
                                        <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                        <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                        <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                                    </ul>
                                </div>
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">Color</span>
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div>
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">Size</span>
                                    <div class="product_size_switch">
                                        <span>xs</span>
                                        <span>s</span>
                                        <span>m</span>
                                        <span>l</span>
                                        <span>xl</span>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <form action="{{route('cart.add', ['id' => $product->id])}}" method="POST">
                             @csrf

                            <div class="cart_extra">
                                <div class="row">
                                    <label class="col-md-6">Cart Product Quantity</label>
                                    <div class="col-md-4 ">
                                        <input type="number" value="1" min="1" class="form-control" name="qty">
                                    </div>
                                </div>
                            </div>
                            <div class="iziToast-wrapper-bottomCenter">
                               <div class="row align-items-end">
                                   <div class="col-lg-4 col-md-4 col-12">
                                       <div class="button cart_buttons">
                                           <button type="submit" class="button-hover-addcart button" style="background-color: #0a53be">Add To Cart</button>
                                       </div>
                                   </div>
                               </div>
                            </div>
                            </form>
                            <hr />
                            <ul class="product-meta">
                                <li>SKU: <a href="#">BE45VGRT</a></li>
                                <li>Category: <a href="#">{{$product->category->name}}</a></li>
                                <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li>
                            </ul>

                            <div class="product_share">
                                <span>Share:</span>
                                <ul class="social_icons">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <p>{!! $product->long_description !!}</p>

                                </div>
                                <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Capacity</td>
                                            <td>5 Kg</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>Black, Brown, Red,</td>
                                        </tr>
                                        <tr>
                                            <td>Water Resistant</td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Material</td>
                                            <td>Artificial Leather</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <div class="comments">
                                        <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                        <ul class="list_none comment_list mt-4">
                                            <li>
                                                <div class="comment_img">
                                                    <img src="{{asset('/')}}website/assets/images/user1.jpg" alt="user1"/>
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:80%"></div>
                                                        </div>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">Alea Brooks</span>
                                                        <span class="comment-date">March 5, 2018</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment_img">
                                                    <img src="{{asset('/')}}website/assets/images/user2.jpg" alt="user2"/>
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:60%"></div>
                                                        </div>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">Grace Wong</span>
                                                        <span class="comment-date">June 17, 2018</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="review_form field_form">
                                        <h5>Add a review</h5>
                                        <form class="row mt-3">
                                            <div class="form-group col-12 mb-3">
                                                <div class="star_rating">
                                                    <span data-value="1"><i class="far fa-star"></i></span>
                                                    <span data-value="2"><i class="far fa-star"></i></span>
                                                    <span data-value="3"><i class="far fa-star"></i></span>
                                                    <span data-value="4"><i class="far fa-star"></i></span>
                                                    <span data-value="5"><i class="far fa-star"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 mb-3">
                                                <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                                            </div>

                                            <div class="form-group col-12 mb-3">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>Releted Products</h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                           @foreach($products as $product)
                            <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="{{asset($product->image)}}" alt="product_img1" height="200">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href=""><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <span class="categories-list">{{$product->category->name}}</span>
                                        <h6 class="product_title">
                                            <a href="{{route('product-detail', ['id' => $product->id])}}">{{$product->name}}</a>
                                        </h6>
                                        <div class="product_price">
                                            <span class="price">Tk.{{$product->selling_price}}</span>
                                            <del>{{$product->regular_price}}</del>
                                            <div class="on_sale">
                                                <span>35% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:80%"></div>
                                            </div>
                                            <span class="rating_num">(21)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#87554B"></span>
                                                <span data-color="#333333"></span>
                                                <span data-color="#DA323F"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
{{--                            <div class="item">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product_img">--}}
{{--                                        <a href="shop-product-detail.html">--}}
{{--                                            <img src="{{asset('/')}}website/assets/images/product_img2.jpg" alt="product_img2">--}}
{{--                                        </a>--}}
{{--                                        <div class="product_action_box">--}}
{{--                                            <ul class="list_none pr_action_btn">--}}
{{--                                                <li class="add-to-cart"><a href=""><i class="icon-basket-loaded"></i> Add To Cart</a></li>--}}
{{--                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>--}}
{{--                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="icon-heart"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_info">--}}
{{--                                        <h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>--}}
{{--                                        <div class="product_price">--}}
{{--                                            <span class="price">$55.00</span>--}}
{{--                                            <del>$95.00</del>--}}
{{--                                            <div class="on_sale">--}}
{{--                                                <span>25% Off</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="rating_wrap">--}}
{{--                                            <div class="rating">--}}
{{--                                                <div class="product_rate" style="width:68%"></div>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating_num">(15)</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="pr_desc">--}}
{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="pr_switch_wrap">--}}
{{--                                            <div class="product_color_switch">--}}
{{--                                                <span class="active" data-color="#847764"></span>--}}
{{--                                                <span data-color="#0393B5"></span>--}}
{{--                                                <span data-color="#DA323F"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="product">--}}
{{--                                    <span class="pr_flash">New</span>--}}
{{--                                    <div class="product_img">--}}
{{--                                        <a href="shop-product-detail.html">--}}
{{--                                            <img src="{{asset('/')}}website/assets/images/product_img3.jpg" alt="product_img3">--}}
{{--                                        </a>--}}
{{--                                        <div class="product_action_box">--}}
{{--                                            <ul class="list_none pr_action_btn">--}}
{{--                                                <li class="add-to-cart"><a href=""><i class="icon-basket-loaded"></i> Add To Cart</a></li>--}}
{{--                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>--}}
{{--                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="icon-heart"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_info">--}}
{{--                                        <h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>--}}
{{--                                        <div class="product_price">--}}
{{--                                            <span class="price">$68.00</span>--}}
{{--                                            <del>$99.00</del>--}}
{{--                                        </div>--}}
{{--                                        <div class="rating_wrap">--}}
{{--                                            <div class="rating">--}}
{{--                                                <div class="product_rate" style="width:87%"></div>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating_num">(25)</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="pr_desc">--}}
{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="pr_switch_wrap">--}}
{{--                                            <div class="product_color_switch">--}}
{{--                                                <span class="active" data-color="#333333"></span>--}}
{{--                                                <span data-color="#7C502F"></span>--}}
{{--                                                <span data-color="#2F366C"></span>--}}
{{--                                                <span data-color="#874A3D"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product_img">--}}
{{--                                        <a href="shop-product-detail.html">--}}
{{--                                            <img src="{{asset('/')}}website/assets/images/product_img4.jpg" alt="product_img4">--}}
{{--                                        </a>--}}
{{--                                        <div class="product_action_box">--}}
{{--                                            <ul class="list_none pr_action_btn">--}}
{{--                                                <li class="add-to-cart"><a href=""><i class="icon-basket-loaded"></i> Add To Cart</a></li>--}}
{{--                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>--}}
{{--                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="icon-heart"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_info">--}}
{{--                                        <h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>--}}
{{--                                        <div class="product_price">--}}
{{--                                            <span class="price">$69.00</span>--}}
{{--                                            <del>$89.00</del>--}}
{{--                                            <div class="on_sale">--}}
{{--                                                <span>20% Off</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="rating_wrap">--}}
{{--                                            <div class="rating">--}}
{{--                                                <div class="product_rate" style="width:70%"></div>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating_num">(22)</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="pr_desc">--}}
{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="pr_switch_wrap">--}}
{{--                                            <div class="product_color_switch">--}}
{{--                                                <span class="active" data-color="#333333"></span>--}}
{{--                                                <span data-color="#A92534"></span>--}}
{{--                                                <span data-color="#B9C2DF"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product_img">--}}
{{--                                        <a href="shop-product-detail.html">--}}
{{--                                            <img src="{{asset('/')}}website/assets/images/product_img5.jpg" alt="product_img5">--}}
{{--                                        </a>--}}
{{--                                        <div class="product_action_box">--}}
{{--                                            <ul class="list_none pr_action_btn">--}}
{{--                                                <li class="add-to-cart"><a href=""><i class="icon-basket-loaded"></i> Add To Cart</a></li>--}}
{{--                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>--}}
{{--                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="icon-heart"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_info">--}}
{{--                                        <h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>--}}
{{--                                        <div class="product_price">--}}
{{--                                            <span class="price">$45.00</span>--}}
{{--                                            <del>$55.25</del>--}}
{{--                                            <div class="on_sale">--}}
{{--                                                <span>35% Off</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="rating_wrap">--}}
{{--                                            <div class="rating">--}}
{{--                                                <div class="product_rate" style="width:80%"></div>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating_num">(21)</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="pr_desc">--}}
{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="pr_switch_wrap">--}}
{{--                                            <div class="product_color_switch">--}}
{{--                                                <span class="active" data-color="#87554B"></span>--}}
{{--                                                <span data-color="#333333"></span>--}}
{{--                                                <span data-color="#5FB7D4"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
