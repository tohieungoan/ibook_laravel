@extends('layouts.app')
@section('content')
@if(session('success'))
    <script>
        alert("{{ session('success') }}");

    </script>
@endif

@if(session('error'))
    <script>
        alert("{{ session('error') }}");

    </script>
@endif

@if(session('change'))
    <script>
        alert("{{ session('change') }}");

    </script>
@endif
@if(session('global'))
    <div class="alert alert-success">
        {{ session('global') }}
    </div>
@endif


<div class="slider-area an-1 hm-1">
    <!-- slider -->
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            <img src="img/slider/home-1/slider1-1.jpg" alt="" title="#slider-direction-1" />
            <img src="img/slider/home-1/slider1-2.jpg" alt="" title="#slider-direction-2" />
        </div>
        <!-- direction 1 -->
        <div id="slider-direction-1" class="t-cn slider-direction">
            <div class="slider-progress"></div>
            <div class="slider-content t-cn s-tb slider-1">
                <div class="title-container s-tb-c title-compress">
                    <h2 class="title1" style="color: white">Ngày hội săn sale</h2>
                    <h3 class="title2">siêu ưu đãi 10-10</h3>
                    <h4 class="title2">Hàng ngàn voucher hot.</h4>
                    <a class="btn-title" href="" style="background-color: red ">Xem ngay</a>
                </div>
            </div>
        </div>
        <!-- direction 2 -->
        <div id="slider-direction-2" class="slider-direction">
            <div class="slider-progress"></div>
            <div class="slider-content t-lfl s-tb slider-2 lft-pr">
                <div class="title-container s-tb-c">
                    <h2 class="title1"></h2>
                    <h3 class="title2"></h3>
                    <h4 class="title2"></h4>
                    <a class="btn-title" href="" style="background-color: red ">Xem ngay</a>
                </div>
            </div>
        </div>
    </div>
    <!-- slider end-->
</div>
<!-- end home slider -->
<!-- product section start -->
<div class="our-product-area">
    <div class="container">
        <!-- area title start -->
        <div class="area-title">
            <h2>Sản phẩm của chúng tôi</h2>
        </div>
        <!-- area title end -->
        <!-- our-product area start -->
        <div class="row">
            <div class="col-md-12">
                <div class="features-tab">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#home" data-toggle="tab">Sản phẩm bán chạy</a>
                        </li>
                        <li role="presentation"><a href="#profile" data-toggle="tab">Sản phẩm ngẫu nhiên</a></li>
                    </ul>
                    <!-- Tab pans -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                            <div class="row">
                                <div class="features-curosel">

                                    @if(isset($productHot))

                                        @foreach($productHot as $key => $hot)
                                            @if($key % 2 == 0)
                                                <div class="col-lg-12 col-md-12">
                                                    <!-- single-product start -->

                                                    <div class="single-product first-sale">
                                                        <span class="sale-text"
                                                            style="color: red; background-color: yellow; font-weight: bold">Sale
                                                            : {{ $hot->pro_sale }}</span>

                                                        <div class="product-img">

                                                            <a href="#">
                                                                <div
                                                                    style="width: 270px ; height: 330px; overflow: hidden;">
                                                                    <img class="primary-image"
                                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                                        src="{{ pare_url_file($hot->pro_avatar) }}"
                                                                        alt="" />
                                                                    <img class="secondary-image"
                                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                                        src="{{ pare_url_file($hot->pro_avatar) }}"
                                                                        alt="" />

                                                                </div>

                                                            </a>
                                                            <div class="action-zoom">
                                                                <div class="add-to-cart">
                                                                    <a href="#" title="Quick View"><i
                                                                            class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="action-buttons">
                                                                    <div class="add-to-links">
                                                                        <div class="add-to-wishlist">
                                                                            <a href="" title="Add to Wishlist"><i
                                                                                    class="fa fa-heart"></i></a>
                                                                        </div>
                                                                        <div class="compare-button">
                                                                            <a href="{{ route('add.shopping.cart',$hot->id) }}"
                                                                                title="Add to Cart"><i
                                                                                    class="icon-bag"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="quickviewbtn">
                                                                        <a href="#" title="Add to Compare"><i
                                                                                class="fa fa-retweet"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-box">
                                                                <span class="new-price">{{ $hot->pro_price }}
                                                                    VND</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h2 class="product-name"><a
                                                                    href="#">{{ $hot->pro_title_seo }}</a></h2>
                                                            <p>{{ $hot->pro_description_seo }}</p>

                                                        </div>
                                                    </div>

                                                    @if(isset($productHot[$key+1]))
                                                        <div class="single-product">
                                                            <span class="sale-text"
                                                                style="color: red; background-color: yellow; font-weight: bold">Sale
                                                                : {{ $productHot[$key+1]->pro_sale }}</span>
                                                            <div class="product-img">
                                                                <a href="#">
                                                                    <div
                                                                        style="width:270px ; height: 330px; overflow: hidden;">
                                                                        <img class="primary-image"
                                                                            style="width: 100%; height: 100%; object-fit: cover;"
                                                                            src="{{ pare_url_file($productHot[$key+1]->pro_avatar) }}"
                                                                            alt="" />
                                                                        <img class="secondary-image"
                                                                            style="width: 100%; height: 100%; object-fit: cover;"
                                                                            src="{{ pare_url_file($productHot[$key+1]->pro_avatar) }}"
                                                                            alt="" />

                                                                    </div>

                                                                </a>
                                                                <div class="action-zoom">
                                                                    <div class="add-to-cart">
                                                                        <a href="#" title="Quick View"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="actions">
                                                                    <div class="action-buttons">
                                                                        <div class="add-to-links">
                                                                            <div class="add-to-wishlist">
                                                                                <a href="#" title="Add to Wishlist"><i
                                                                                        class="fa fa-heart"></i></a>
                                                                            </div>
                                                                            <div class="compare-button">
                                                                                <a href="#" title="Add to Cart"><i
                                                                                        class="icon-bag"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="quickviewbtn">
                                                                            <a href="#" title="Add to Compare"><i
                                                                                    class="fa fa-retweet"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span
                                                                        class="new-price">{{ $productHot[$key+1]->pro_price }}
                                                                        VND</span>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <h2 class="product-name"><a
                                                                        href="#">{{ $productHot[$key+1]->pro_title_seo }}</a>
                                                                </h2>
                                                                <p>{{ $productHot[$key+1]->pro_description_seo }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endif


                                                </div>
                                            @endif
                                        @endforeach

                                    @endif



                                    <!-- single-product end -->
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <div class="row">
                                <div class="features-curosel">
                                    @if(isset($productRandom))

                                        @foreach($productRandom as $key2 => $random)
                                            @if($key2 % 2 == 0)
                                                <div class="col-lg-12 col-md-12">
                                                    <!-- single-product start -->
                                                    <div class="single-product first-sale">
                                                        <span class="sale-text"
                                                            style="color: red; background-color: yellow; font-weight: bold">Sale
                                                            : {{ $random->pro_sale }}</span>

                                                        <div class="product-img">
                                                            <a href="#">
                                                                <div style="width: ; height: 330px; overflow: hidden;">
                                                                    <img class="primary-image"
                                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                                        src="{{ pare_url_file($random->pro_avatar) }}"
                                                                        alt="" />
                                                                    <img class="secondary-image"
                                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                                        src="{{ pare_url_file($random->pro_avatar) }}"
                                                                        alt="" />

                                                                </div>

                                                            </a>
                                                            <div class="action-zoom">
                                                                <div class="add-to-cart">
                                                                    <a href="#" title="Quick View"><i
                                                                            class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="action-buttons">
                                                                    <div class="add-to-links">
                                                                        <div class="add-to-wishlist">
                                                                            <a href="#" title="Add to Wishlist"><i
                                                                                    class="fa fa-heart"></i></a>
                                                                        </div>
                                                                        <div class="compare-button">
                                                                            <a href="#" title="Add to Cart"><i
                                                                                    class="icon-bag"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="quickviewbtn">
                                                                        <a href="#" title="Add to Compare"><i
                                                                                class="fa fa-retweet"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-box">
                                                                <span class="new-price">{{ $random->pro_price }}
                                                                    VND</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h2 class="product-name"><a
                                                                    href="#">{{ $random->pro_title_seo }}</a></h2>
                                                            <p>{{ $random->pro_description_seo }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- single-product end -->
                                                    <!-- single-product start -->
                                                    @if(isset($productRandom[$key2+1]))
                                                        <div class="single-product">
                                                            <span class="sale-text"
                                                                style="color: red; background-color: yellow; font-weight: bold">Sale
                                                                :
                                                                {{ $productRandom[$key2+1]->pro_sale }}</span>

                                                            <div class="product-img">
                                                                <a href="#">
                                                                    <div
                                                                        style="width: ; height: 330px; overflow: hidden;">
                                                                        <img class="primary-image"
                                                                            style="width: 100%; height: 100%; object-fit: cover;"
                                                                            src="{{ pare_url_file($productRandom[$key2+1]->pro_avatar) }}"
                                                                            alt="" />
                                                                        <img class="secondary-image"
                                                                            style="width: 100%; height: 100%; object-fit: cover;"
                                                                            src="{{ pare_url_file($productRandom[$key2+1]->pro_avatar) }}"
                                                                            alt="" />

                                                                    </div>

                                                                </a>
                                                                <div class="action-zoom">
                                                                    <div class="add-to-cart">
                                                                        <a href="#" title="Quick View"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="actions">
                                                                    <div class="action-buttons">
                                                                        <div class="add-to-links">
                                                                            <div class="add-to-wishlist">
                                                                                <a href="#" title="Add to Wishlist"><i
                                                                                        class="fa fa-heart"></i></a>
                                                                            </div>
                                                                            <div class="compare-button">
                                                                                <a href="#" title="Add to Cart"><i
                                                                                        class="icon-bag"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="quickviewbtn">
                                                                            <a href="#" title="Add to Compare"><i
                                                                                    class="fa fa-retweet"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span
                                                                        class="new-price">{{ $productRandom[$key2+1]->pro_price }}
                                                                        VND</span>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <h2 class="product-name"><a
                                                                        href="#">{{ $productRandom[$key2+1]->pro_title_seo }}</a>
                                                                </h2>
                                                                <p>{{ $productRandom[$key2+1]->pro_description_seo }}
                                                                </p>
                                                            </div>
                                                    @endif
                                                    <!-- single-product end -->




                                                </div>
                                </div>
                                @endif
                                @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- our-product area end -->
    </div>
</div>
<!-- product section end -->
<!-- banner-area start -->
<div class="banner-area">
    <div class="container-fluid">
        <div class="row">
            <a href=""><img src="img/banner/banner-1.jpg" alt="" /></a>
        </div>
    </div>
</div>
<!-- banner-area end -->
<!-- product section start -->
<div class="our-product-area new-product">
    <div class="container">
        <div class="area-title">
            <h2>Sản phẩm mới</h2>
        </div>
        <!-- our-product area start -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="features-curosel">
                        <!-- single-product start -->
                        @if(isset($newProduct))
                            @foreach($newProduct as $new)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-product first-sale">
                                        <div class="product-img">
                                            <a href="#">
                                                <div style="width: ; height: 330px; overflow: hidden;">
                                                    <img class="primary-image"
                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                        src="{{ pare_url_file($new->pro_avatar) }}" alt="" />
                                                    <img class="secondary-image"
                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                        src="{{ pare_url_file($new->pro_avatar) }}" alt="" />

                                                </div>

                                            </a>
                                            <div class="action-zoom">
                                                <div class="add-to-cart">
                                                    <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="#" title="Add to Wishlist"><i
                                                                    class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="compare-button">
                                                            <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="#" title="Add to Compare"><i
                                                                class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price">{{ $new->pro_price }} VND</span>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name"><a href="#">{{ $new->pro_title_seo }}</a></h2>
                                            <p>{{ $new->pro_description_seo }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->

                            @endforeach
                        @endif





                        <!-- single-product end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- our-product area end -->
    </div>
</div>
<!-- product section end -->
<!-- latestpost area start -->
<div class="latest-post-area">
    <div class="container">
        <div class="area-title">
            <h2>Bài đăng mới nhất</h2>
        </div>
        <div class="row">
            <div class="all-singlepost">
                <!-- single latestpost start -->

                @if(isset($news))
                    @foreach($news as $newbangtin)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="#">
                                        <div style="width: 370px; height: 280px; overflow: hidden;">
                                            <img src="{{ pare_url_file($newbangtin->a_avatar) }}" alt="Image"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </a>
                                </div>
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="#">{{ $newbangtin->a_name }}</a>
                                        <span>/</span>
                                        <span>Post by</span>
                                        <span>{{ $newbangtin->a_author_id }}</span>
                                    </div>
                                    <div class="postexcerpt">
                                        <p>{{ $newbangtin->a_description_seo }}</p>
                                        <a href="#" class="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif






            </div>
        </div>
    </div>
</div>
<!-- latestpost area end -->
<!-- block category area start -->
<div class="block-category">
    <div class="container">
        <div class="row">
            <!-- featured block start -->
            <div class="col-md-4">
                <!-- block title start -->
                <div class="block-title">
                    <h2>Featureds</h2>
                </div>
                <!-- block title end -->
                <!-- block carousel start -->
                <div class="block-carousel">

                    @if((isset($newProduct)))
                        @foreach($newProduct as $nn)
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html">
                                            <div style="width: 170px; height: 208px; overflow: hidden;">
                                                <img src="{{ pare_url_file($nn->pro_avatar) }}" alt="Image"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html">
                                            <div style="width: 170px; height: 208px; overflow: hidden;">
                                                <img src="{{ pare_url_file($nn->pro_avatar) }}" alt="Image"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$205.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        @endforeach
                    @endif

                </div>
                <!-- block carousel end -->
            </div>
            <!-- featured block end -->
            <!-- featured block start -->
            <div class="col-md-4">
                <!-- block title start -->
                <div class="block-title">
                    <h2>On Sales</h2>
                </div>
                <!-- block title end -->
                <!-- block carousel start -->
                <div class="block-carousel">
                    @if((isset($newProduct)))
                        @foreach($newProduct as $nnn)


                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html">
                                            <div style="width: 170px; height: 208px; overflow: hidden;">
                                                <img src="{{ pare_url_file($nnn->pro_avatar) }}" alt="Image"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html">
                                            <div style="width: 170px; height: 208px; overflow: hidden;">
                                                <img src="{{ pare_url_file($nnn->pro_avatar) }}" alt="Image"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Cras neque metus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        @endforeach
                    @endif


                </div>
                <!-- block carousel end -->
            </div>
            <!-- featured block end -->
            <!-- featured block start -->
            <div class="col-md-4">
                <!-- block title start -->
                <div class="block-title">
                    <h2>Populers</h2>
                </div>
                <!-- block title end -->
                <!-- block carousel start -->
                <div class="block-carousel">


                    @if((isset($newProduct)))
                        @foreach($newProduct as $nnnn)
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html">
                                            <div style="width: 170px; height: 208px; overflow: hidden;">
                                                <img src="{{ pare_url_file($nnnn->pro_avatar) }}" alt="Image"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html">
                                            <div style="width: 170px; height: 208px; overflow: hidden;">
                                                <img src="{{ pare_url_file($nnnn->pro_avatar) }}" alt="Image"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Cras neque metus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        @endforeach
                    @endif




                </div>
                <!-- block carousel end -->
            </div>
            <!-- featured block end -->
        </div>
    </div>
</div>
<!-- block category area end -->
<!-- testimonial area start -->
<div class="testimonial-area lap-ruffel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="crusial-carousel">
                    <div class="crusial-content">
                        <p>“Mang niềm vui đến cho mọi nhà."</p>
                        <span>iBook</span>
                    </div>
                    <div class="crusial-content">
                        <p>“Khơi dậy niềm đam mê của bạn."</p>
                        <span>iBook</span>
                    </div>
                    <div class="crusial-content">
                        <p>“Tất cả những gì bạn cần, đều có tại đây."</p>
                        <span>iBook</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial area end -->
<!-- Brand Logo Area Start -->
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="brand-carousel">
                <div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
            </div>
        </div>
    </div>
</div>

@stop
