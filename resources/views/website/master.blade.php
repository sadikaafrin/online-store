<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- SITE TITLE -->
    <title></title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}website/assets/images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/all.min.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/linearicons.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/simple-line-icons.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/magnific-popup.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/slick.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/slick-theme.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/responsive.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106310707-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-106310707-1', { 'anonymize_ip': true });
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G6MPNF0KNC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-G6MPNF0KNC');
    </script>


    <!-- Hotjar Tracking Code for bestwebcreator.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2073024,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Start of StatCounter Code -->
    <script>
        <!--
        var sc_project=11921154;
        var sc_security="6c07f98b";
        var scJsHost = (("https:" == document.location.protocol) ?
            "https://secure." : "http://www.");
        //-->

        document.write("<sc"+"ript src='" +scJsHost +"statcounter.com/counter/counter.js'></"+"script>");
    </script>
    <!-- End of StatCounter Code -->

</head>

<body>


<!-- START HEADER -->
<header class="header_wrap">
    <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="header_topbar_info">
                        <div class="header_offer">
                            <span>Free Ground Shipping Over $250</span>
                        </div>
                        <div class="download_wrap">
                            <span class="me-3">Download App</span>
                            <ul class="icon_list text-center text-lg-start">
                                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                                <li><a href="#"><i class="fab fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    @if(Session::get('customer_id'))
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <ul class="navbar-nav attr-nav align-items-center">
                            <li style="color: white">
                                <i class="ti-user"></i>
                                Hello {{Session::get('customer_name')}}
                            </li>
                        </ul>
                        <div class="ms-3">
                            <ul class="navbar-nav attr-nav align-items-center">
                                <li><a href="{{route('customer.dashboard')}}" class="nav-link">Dashboard</a></li>
                                <li><a href="{{route('customer.logout')}}" class="nav-link">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center justify-content-md-end">

                            <div class="ms-3">
                                <ul class="navbar-nav attr-nav align-items-center">
                                    <li><a href="{{route('customer.login')}}" class="nav-link">Sign In</a></li>
                                    <li><a href="{{route('customer.register')}}" class="nav-link">Register</a></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img class="logo_dark" src="{{asset('/')}}website/assets/images/logo_dark.png" alt="logo">
                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form>
                        <div class="input-group">

                            <input class="form-control" placeholder="Search Product..." required="" type="text">
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
{{--                    <li><a href="login.html" class="nav-link"><i class="linearicons-user"></i></a></li>--}}
{{--                    <li>{{Session::get('customer')}}</li>--}}
{{--                    <li><a href="login.html"><i class="ti-user"></i><span>Login</span></a></li>--}}
                    <li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>
                    <li class="dropdown cart_dropdown">
                        <a class="nav-link cart_trigger" href="#" data-bs-toggle="dropdown">
                            <i class="linearicons-bag2"></i><span class="cart_count">{{count(Cart::content())}}</span>
                        </a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <div class="shopping_info">

                                    <p class="dropdown-item">
                                        <a href="{{route('cart.show')}}" style="float: left;">View Cart</a>
                                        <span style="float: right;">{{count(Cart::content())}} Item</span>
                                    </p>
                                </div>
                                @php($sum=0)
                                @foreach(Cart::content() as $cartItem)
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#">
                                        <img src="{{asset($cartItem->options->image)}}" alt="cart_thumb1">
                                        {{$cartItem->name}}
                                    </a>
                                    <span class="cart_quantity">{{$cartItem->qty}} x <span class="cart_amount"></span>{{$cartItem->price}}</span> = <span>{{round($cartItem->subtotal)}}</span>
                                </li>
                                    @php($sum += $cartItem->subtotal)
                                @endforeach
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> {{$sum}}</span></p>
                                <p class="cart_buttons">
{{--                                    <a href="#" class="btn btn-fill-line view-cart">View Cart</a>--}}
                                    <a href="{{route('checkout')}}" class="btn btn-fill-out checkout">Checkout</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                            <span>All Categories</span>

                            <i class="linearicons-menu"></i>

                        </button>
                        <div id="navCatContent" class="navbar nav collapse">
                            <ul>
                                @foreach($categories as $category)
                                    @if(count($category->subCategories) > 0)
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="{{route('product-category', ['id' => $category->id])}}">
                                        {{$category->name}}
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-4">
                                                <ul>
                                                    @foreach($category->subCategories as $subCategory)
                                                    <li>
                                                        <a class="dropdown-item nav-link nav_item" href="">
                                                            {{$subCategory->name}}
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                    @else
                                        <li class="dropdown dropdown-mega-menu">
                                            <a class="dropdown-item nav-link" href="#" style="pointer-events: none; color: grey;">
                                                {{$category->name}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">

                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li class="dropdown">
                                    <a data-bs-toggle="dropdown" class="nav-link dropdown-toggle active" href="">Home</a>

                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu">

                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Products</a>
                                    <div class="dropdown-menu">

                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Blog</a>
                                    <div class="dropdown-menu dropdown-reverse">

                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Shop</a>
                                    <div class="dropdown-menu">

                                    </div>
                                </li>
                                <li><a class="nav-link nav_item" href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->
@yield('body')
<!-- START FOOTER -->
<footer class="bg_gray">
    <div class="footer_top small_pt pb_20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="{{asset('/')}}website/assets/images/logo_dark.png" alt="logo"/></a>
                        </div>
                        <p class="mb-3">If you are going to use of Lorem Ipsum need to be sure there isn't anything hidden of text</p>
                        <ul class="contact_info">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>123 Street, Old Trafford, NewYork, USA</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@sitename.com">info@sitename.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>+ 457 789 789 65</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Useful Links</h6>
                        <ul class="widget_links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">My Account</h6>
                        <ul class="widget_links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Discount</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">Download App</h6>
                        <ul class="app_list">
                            <li><a href="#"><img src="{{asset('/')}}website/assets/images/f1.png" alt="f1"/></a></li>
                            <li><a href="#"><img src="{{asset('/')}}website/assets/images/f2.png" alt="f2"/></a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h6 class="widget_title">Social</h6>
                        <ul class="social_icons">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle_footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shopping_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-shipped"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>Free Delivery</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-money-back"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>30 Day Returns Guarantee</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>27/4 Online Support</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-center text-md-start mb-md-0">© 2020 All Rights Reserved by Bestwebcreator</p>
                </div>
                <div class="col-lg-6">
                    <ul class="footer_payment text-center text-md-end">
                        <li><a href="#"><img src="{{asset('/')}}website/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="{{asset('/')}}website/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="{{asset('/')}}website/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="{{asset('/')}}website/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="{{asset('/')}}website/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="{{asset('/')}}website/assets/js/jquery-3.7.0.min.js"></script>
<!-- popper min js -->
<script src="{{asset('/')}}website/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{asset('/')}}website/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- owl-carousel min js  -->
<script src="{{asset('/')}}website/assets/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup min js  -->
<script src="{{asset('/')}}website/assets/js/magnific-popup.min.js"></script>
<!-- waypoints min js  -->
<script src="{{asset('/')}}website/assets/js/waypoints.min.js"></script>
<!-- parallax js  -->
<script src="{{asset('/')}}website/assets/js/parallax.js"></script>
<!-- countdown js  -->
<script src="{{asset('/')}}website/assets/js/jquery.countdown.min.js"></script>
<!-- imagesloaded js -->
<script src="{{asset('/')}}website/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js -->
<script src="{{asset('/')}}website/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="{{asset('/')}}website/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="{{asset('/')}}website/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="{{asset('/')}}website/assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js -->
<script src="{{asset('/')}}website/assets/js/scripts.js"></script>



</body>
</html>
