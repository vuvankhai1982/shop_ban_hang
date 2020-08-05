@extends('frontend.layout')
@section('content')
<!-- BEGIN SLIDER -->
<div class="page-slider margin-bottom-35">
    <div id="carousel-example-generic" class="carousel slide carousel-slider">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
            <div class="item carousel-item-four active">
                <div class="container">
                    <div class="carousel-position-four text-center">
                        <h2 class="margin-bottom-20 animate-delay carousel-title-v3 border-bottom-title text-uppercase" data-animation="animated fadeInDown">
                            Tones of <br/><span class="color-red-v2">Shop UI Features</span><br/> designed
                        </h2>
                        <p class="carousel-subtitle-v2" data-animation="animated fadeInUp">Lorem ipsum dolor sit amet constectetuer diam <br/>
                            adipiscing elit euismod ut laoreet dolore.</p>
                    </div>
                </div>
            </div>

            <!-- Second slide -->
            <div class="item carousel-item-five">
                <div class="container">
                    <div class="carousel-position-four text-center">
                        <h2 class="animate-delay carousel-title-v4" data-animation="animated fadeInDown">
                            Unlimted
                        </h2>
                        <p class="carousel-subtitle-v2" data-animation="animated fadeInDown">
                            Layout Options
                        </p>
                        <p class="carousel-subtitle-v3 margin-bottom-30" data-animation="animated fadeInUp">
                            Fully Responsive
                        </p>
                        <a class="carousel-btn" href="#" data-animation="animated fadeInUp">See More Details</a>
                    </div>
                    <img class="carousel-position-five animate-delay hidden-sm hidden-xs" src="assets/pages/img/shop-slider/slide2/price.png" alt="Price" data-animation="animated zoomIn">
                </div>
            </div>

            <!-- Third slide -->
            <div class="item carousel-item-six">
                <div class="container">
                    <div class="carousel-position-four text-center">
                            <span class="carousel-subtitle-v3 margin-bottom-15" data-animation="animated fadeInDown">
                                Full Admin &amp; Frontend
                            </span>
                        <p class="carousel-subtitle-v4" data-animation="animated fadeInDown">
                            eCommerce UI
                        </p>
                        <p class="carousel-subtitle-v3" data-animation="animated fadeInDown">
                            Is Ready For Your Project
                        </p>
                    </div>
                </div>
            </div>

            <!-- Fourth slide -->
            <div class="item carousel-item-seven">
                <div class="center-block">
                    <div class="center-block-wrap">
                        <div class="center-block-body">
                            <h2 class="carousel-title-v1 margin-bottom-20" data-animation="animated fadeInDown">
                                The most <br/>
                                wanted bijouterie
                            </h2>
                            <a class="carousel-btn" href="#" data-animation="animated fadeInUp">But It Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <a class="right carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
<!-- END SLIDER -->

<div class="main">
    <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>Sản Phẩm Mới</h2>

                <div class="owl-carousel owl-carousel5">
                    @foreach($products as $product)
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img style="width: 200px; height: 200px" src="{{asset('images/'.$product->image)}}" class="img-responsive" alt="Berry Lace Dress">
                                <div>
                                    <a href="{{asset('images/'.$product->image)}}" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="{{asset('products/'.$product->id)}}" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                            <div class="pi-price">{{number_format($product->unit_price,0,',', '.')}} VND</div>
                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            <div class="sticker sticker-sale"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-4">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    @foreach($categories as $cate)
                    <li class="list-group-item clearfix"><a href="product-categories/{{$cate->id}}"><i class="fa fa-angle-right"></i> {{$cate->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-8">
                <h2>Váy Nữ Nổi Bật</h2>
                <div class="owl-carousel owl-carousel3">
                    @foreach($dress as $dr)
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img style="width: 250px; height: 250px" src="{{asset('images/'.$dr->image)}}" class="img-responsive" alt="Berry Lace Dress">
                                <div>
                                    <a href="{{asset('images/'.$dr->image)}}" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="{{asset('products/'.$dr->id)}}" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                            <div class="pi-price">{{number_format($dr->unit_price,0,',', '.')}} VND</div>
                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            <div class="sticker sticker-new"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 ">
            <!-- BEGIN TWO PRODUCTS -->
            <div class="col-md-6 two-items-bottom-items">
                <h2>Áo Nam Nổi Bật</h2>
                <div class="owl-carousel owl-carousel2">
                    @foreach($mens as $men)
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{{asset('images/'.$men->image)}}" class="img-responsive" alt="Berry Lace Dress">
                                <div>
                                    <a href="{{asset('images/'.$men->image)}}" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="{{asset('products/'.$men->id)}}" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                            <div class="pi-price">{{number_format($men->unit_price,0,',', '.')}} VND</div>
                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- END TWO PRODUCTS -->
            <!-- BEGIN PROMO -->
            <div class="col-md-6 shop-index-carousel">
                <div class="content-slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="assets/pages/img/index-sliders/slide1.jpg" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                            <div class="item">
                                <img src="assets/pages/img/index-sliders/slide2.jpg" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                            <div class="item">
                                <img src="assets/pages/img/index-sliders/slide3.jpg" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROMO -->
        </div>
        <!-- END TWO PRODUCTS & PROMO -->
    </div>
</div>

<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/next.jpg" alt="next" title="next"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/next.jpg" alt="next" title="next"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
            <a href="shop-product-list.html"><img src="assets/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
        </div>
    </div>
</div>
<!-- END BRANDS -->

@endsection
