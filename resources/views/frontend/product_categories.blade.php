@extends('frontend.layout')
@section('content')
<div class="title-wrapper">
    <div class="container"><div class="container-inner">
            <h1><span>MEN</span> CATEGORY</h1>
            <em>Over 4000 Items are available here</em>
        </div></div>
</div>

<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Men category</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        @foreach($categories as $cate)
                            <li class="list-group-item clearfix"><a href="product-categories/{{$cate->id}}"><i class="fa fa-angle-right"></i> {{$cate->name}}</a></li>
                        @endforeach
                </ul>

                <div class="sidebar-filter margin-bottom-25">
                    <h2>Filter</h2>
                    <h3>Availability</h3>
                    <div class="checkbox-list">
                        <label><input type="checkbox"> Not Available (3)</label>
                        <label><input type="checkbox"> In Stock (26)</label>
                    </div>

                    <h3>Price</h3>
                    <p>
                        <label for="amount">Range:</label>
                        <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-range"></div>
                </div>

                <div class="sidebar-products clearfix">
                    <h2>Sản Phẩm Bán Chạy Nhất</h2>
                    @foreach($bestsellers as $bestseller)
                        <div class="item">
                            <a href="{{asset('products/'.$bestseller->id)}}"><img src="{{asset('images/'.$bestseller->image)}}" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="{{asset('products/'.$bestseller->id)}}">{{$bestseller->description}}</a></h3>
                            <div class="price">{{number_format($bestseller->unit_price,0,',', '.')}} VND</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <div class="row list-view-sorting clearfix">
                    <div class="col-md-2 col-sm-2 list-view">
                        <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                        <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="pull-right">
                            <label class="control-label">Show:</label>
                            <select class="form-control input-sm">
                                <option value="#?limit=24" selected="selected">24</option>
                                <option value="#?limit=25">25</option>
                                <option value="#?limit=50">50</option>
                                <option value="#?limit=75">75</option>
                                <option value="#?limit=100">100</option>
                            </select>
                        </div>
                        <div class="pull-right">
                            <label class="control-label">Sort&nbsp;By:</label>
                            <select class="form-control input-sm">
                                <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                                <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                                <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                                <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                                <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                                <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                                <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                                <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                                <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- BEGIN PRODUCT LIST -->
                <div class="row product-list">
                    <!-- PRODUCT ITEM START -->
                    @foreach($items as $item)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{{asset('images/'.$item->image)}}" class="img-responsive" alt="Berry Lace Dress">
                                <div>
                                    <a href="{{asset('images/'.$item->image)}}" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="{{asset('products/'.$item->id)}}" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item.html">Berry Lace Dress Berry Lace Dress</a></h3>
                            <div class="pi-price">{{number_format($item->unit_price,0,',', '.')}} VND</div>
                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                        </div>

                    </div>
                @endforeach
                    <!-- PRODUCT ITEM END -->
                </div>
                <!-- END PRODUCT LIST -->
                <!-- BEGIN PAGINATOR -->
                <div class="row">
                    <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>
                    <div class="col-md-8 col-sm-8">
                        <ul class="pagination pull-right">
                            {{ $items->links() }}
                        </ul>
                    </div>
                </div>
                <!-- END PAGINATOR -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>

<!-- BEGIN BRANDS -->
{{--<div class="brands">--}}
{{--    <div class="container">--}}
{{--        <div class="owl-carousel owl-carousel6-brands">--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/next.jpg" alt="next" title="next"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/next.jpg" alt="next" title="next"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>--}}
{{--            <a href="shop-product-list.html"><img src="assets/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- END BRANDS -->
@endsection
