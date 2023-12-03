@extends('layouts.app')
@section('content')
<div class="category-banner">
    <div class="cat-heading">
        <span>ibook</span>
    </div>
</div>
@if (session()->has('viewData'))
    @php
        $viewData = session()->get('viewData');
        $products = $viewData['products'];
        session()->forget('viewData');

    @endphp
    @endif

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="index.html">Home</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Sản phẩm</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- shop-with-sidebar Start -->
<div class="shop-with-sidebar">
    <div class="container">
        <div class="row">
            <!-- left sidebar start -->
            <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                <div class="topbar-left">
                    <aside class="widge-topbar">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
                          
                        </div>
                    </aside>
                    <aside class="sidebar-content">
                        <div class="sidebar-title">
                            <h6>Categories</h6>
                        </div>
                        <ul class="sidebar-tags">
                        
                            @if(isset($categories))
                            @foreach($categories as  $category)
                            <li>  <a href="{{ route('get.list.product', [$category->c_slug, $category->id]) }}">{{ $category->c_name }}</a>    </li>
                            @endforeach
                            @endif
                        </ul>
                
                    </aside>
           	
                    <aside class="widge-topbar">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
                            <h2>Tags</h2>
                        </div>
                        <div class="exp-tags">
                            <div class="tags">
                                <a href="#">Figure</a>
                                <a href="#">thiếu nhi</a>
                                <a href="#">tâm lí</a>
                                <a href="#">trinh thám</a>
                                <a href="#">giáo khoa</a>
                                <a href="#">truyện tranh</a>
                                <a href="#">tiểu thuyết</a>
                                <a href="#">máy đọc sách</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <!-- left sidebar end -->
            <!-- right sidebar start -->
            <div class="col-md-9 col-sm-12 col-xs-12">
                <!-- shop toolbar start -->
                <div class="shop-content-area">
                    <div class="shop-toolbar">
                        <div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left">
                            <form class="tree-most" action="{{ route('sortproduct')}}" method="post">

                                @csrf
                                <input type="hidden" name="current_url" value="{{ url()->current() }}">
                                <div class="orderby-wrapper">
                                    <label>Sắp xếp theo</label>
                                    <select name="orderby" class="orderby" id="orderby-select">
                                        <option value="menu_order" selected="selected">Mặc định</option>
                                        <option value="popularity">Mức độ phổ biến</option>
                                        <option value="rating">Đánh giá trung bình</option>
                                        <option value="price">Giá từ thấp đến cao</option>
                                        <option value="price-desc">Giá từ cao đến thấp</option>
                                    </select>
                                    <button class="btn btn-primary">Tìm</button>
                                </div>
                            </form>
                        </div>
                   
                  
                    </div>
                </div>
                <!-- shop toolbar end -->
                <!-- product-row start -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="shop-grid-tab">
                        <div class="row">
                            <div class="shop-product-tab first-sale">
                                @if(isset($products))
                                @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="two-product">
                                        <!-- single-product start -->
                                        <div class="single-product">
                                            <span class="sale-text">Sale {{ $product->pro_sale }} %</span>
                                            <div class="product-img">
                                                <a href="#">

                                                 

                                                      <div style="width: ; height: 330px; overflow: hidden;">
                                                    <img class="primary-image" style="width: 100%; height: 100%; object-fit: cover;" src="{{ pare_url_file($product->pro_avatar)}}" alt="" />
                                                    <img class="secondary-image" style="width: 100%; height: 100%; object-fit: cover;"  src="{{ pare_url_file($product->pro_avatar)}}" alt="" />
                                                </div>
                                                </a>
                                                <div class="action-zoom">
                                                    <div class="add-to-cart">
                                                        <a href="{{ route('get.detail.product', [$product->pro_slug, $product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="action-buttons">
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                            </div>									
                                                        </div>
                                                        <div class="quickviewbtn">
                                                            <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    <span class="new-price">{{ $formattedPrice = number_format($product->pro_price, 0, '', ',') }}</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">{{ $product->pro_name }}</a></h2>
                                                <p>{{ $product->pro_description_seo }}</p>
                                            </div>
                                        </div>
                                        <!-- single-product end -->
                                    </div>
                                </div>
                                @endforeach
                                @endif
                             
                            </div>
                        </div>
            
                    
                    </div>
                    <!-- list view -->
                    <div class="tab-pane fade" id="shop-list-tab">
                        <div class="list-view">
                            <!-- single-product start -->
                            
                      
                  
                   
                            <!-- single-product end -->
                        </div>
                    </div>
                    <!-- shop toolbar start -->
                    <div class="shop-content-bottom">
                        <div class="shop-toolbar btn-tlbr">
                            <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs nopadding-left text-left">
                                <form class="tree-most" action="{{ route('sortproduct')}}" method="post">
                                @csrf
                                <input type="hidden" name="current_url" value="{{ url()->current() }}">

                                    <div class="orderby-wrapper">
                                        <label>Sắp xếp theo</label>
                                        <select name="orderby" class="orderby" id="orderby-select">
                                            <option value="menu_order" selected="selected">Mặc định</option>
                                            <option value="popularity">Mức độ phổ biến</option>
                                            <option value="rating">Đánh giá trung bình</option>
                                            <option value="price">Giá từ thấp đến cao</option>
                                            <option value="price-desc">Giá từ cao đến thấp</option>
                                        </select>
                                        <button class="btn btn-primary">Tìm</button>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                               
                                   
                             
                                        {{ $products->links('components.pagination')  }}
                                       
                                 
                              
                            </div>
                      
                        </div>
                    </div>
      
                </div>
            </div>
            <!-- right sidebar end -->
        </div>
    </div>
</div>
@stop