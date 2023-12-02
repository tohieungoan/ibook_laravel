<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="{{ route('home.index') }}"><img src="/img/logo.png" alt="" /></a>

                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="{{ route('home.index') }}">Trang chủ</a>
                            								
                            </li>
                            <li class="expand">
                                <a href="shop-grid.html">Sản phẩm</a>
                                <div class="restrain mega-menu megamenu1">
                                    <span>
                                      
                                        @if(isset($categories))
                                            @foreach($categories as $key => $category)
                                                @if($key % 5 == 0)
                                                    </span><span> <!-- Đóng và mở thẻ span mới để bắt đầu hàng dọc mới -->
                                                @endif
                                          <a href="{{ route('get.list.product', [$category->c_slug, $category->id]) }}">{{ $category->c_name }}</a>
                                          
                                                
                                            @endforeach
                                        @endif
                                    </span>
                                    <span class="block-last">
                                        <img src="img/block_menu.jpg" alt="" />
                                    </span>
                                </div>
                            </li>
                       
                     
                    
                            <li class="expand"><a href="{{ route('get.contact') }}">Liên hệ</a></li>
                            
                           
                            <li class="expand"><a href="{{ route('returnview') }}">Tin tức</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- mobile menu start -->
                <div class="row">
                    <div class="col-sm-12 mobile-menu-area">
                        <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                            <span class="mobile-menu-title">Menu</span>
                            <nav>
                                <ul>
                                    <li><a href="">Trang chủ</a>
                             
                                    </li>




                                    <li><a href="">Sản phẩm</a>
                                        <ul>
                                       
                                               @if(isset($categories))
                                            @foreach($categories as $key => $category)
                                                @if($key % 5 == 0)
                                                    </span><span> <!-- Đóng và mở thẻ span mới để bắt đầu hàng dọc mới -->
                                                @endif
                                                <a  class="mega-menu-title" href="{{ route('get.list.product', [$category->c_slug, $category->id]) }}">{{ $category->c_name }}</a>
                                          <li><a class="mega-menu-title" href="shop-grid.html"> Clothing </a>
                                       
                                        </li>
                                                
                                            @endforeach
                                        @endif
                                           
                                        </ul>
                                    </li>





        <li class="expand">
                                <a href="">Sản phẩm</a>
                                <div class="restrain mega-menu megamenu1">
                                    <span>
                                      
                                        @if(isset($categories))
                                            @foreach($categories as $key => $category)
                                                @if($key % 5 == 0)
                                                    </span><span> <!-- Đóng và mở thẻ span mới để bắt đầu hàng dọc mới -->
                                                @endif
                                          <a href="{{ route('get.list.product', [$category->c_slug, $category->id]) }}">{{ $category->c_name }}</a>
                                          
                                                
                                            @endforeach
                                        @endif
                                    </span>
                                    <span class="block-last">
                                        <img src="img/block_menu.jpg" alt="" />
                                    </span>
                                </div>
                            </li>



                                    <li><a href="shop-list.html">Women</a>
                                        <ul>
                                            <li><a href="shop-grid.html">Rings</a>
                                                <ul>
                                                    <li><a href="shop-grid.html">Coats & Jackets</a></li>
                                                    <li><a href="shop-grid.html">Blazers</a></li>
                                                    <li><a href="shop-grid.html">Jackets</a></li>
                                                    <li><a href="shop-grid.html">Rincoats</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-grid.html">Dresses</a>
                                                <ul>
                                                    <li><a href="shop-grid.html">Ankle Boots</a></li>
                                                    <li><a href="shop-grid.html">Footwear</a></li>
                                                    <li><a href="shop-grid.html">Clog Sandals</a></li>
                                                    <li><a href="shop-grid.html">Combat Boots</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-grid.html">Accessories</a>
                                                <ul>
                                                    <li><a href="shop-grid.html">Bootees bags</a></li>
                                                    <li><a href="shop-grid.html">Blazers</a></li>
                                                    <li><a href="shop-grid.html">Jackets</a></li>
                                                    <li><a href="shop-grid.html">Jackets</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-grid.html">Top</a>
                                                <ul>
                                                    <li><a href="shop-grid.html">Briefs</a></li>
                                                    <li><a href="shop-grid.html">Camis</a></li>
                                                    <li><a href="shop-grid.html">Nigntwears</a></li>
                                                    <li><a href="shop-grid.html">Shapewears</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-grid.html">Shop</a>
                                        <ul>
                                            <li><a href="shop-list.html">Shop Pages</a>
                                                <ul>
                                                    <li><a href="shop-list.html">List View </a></li>
                                                    <li><a href="shop-grid.html">Grid View</a></li>
                                                    <li><a href="login.html">My Account</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="cart.html">Cart </a></li>
                                                    <li><a href="checkout.html">Checkout </a></li>
                                                </ul>
                                            </li>
                                            <li><a href="product-details.html">Product Types</a>
                                                <ul>
                                                    <li><a href="product-details.html">Simple Product</a></li>
                                                    <li><a href="product-details.html">Variables Product</a></li>
                                                    <li><a href="product-details.html">Grouped Product</a></li>
                                                    <li><a href="product-details.html">Downloadable</a></li>
                                                    <li><a href="product-details.html">Virtual Product</a></li>
                                                    <li><a href="product-details.html">External Product</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="shop-grid.html">Shop Grid</a></li>
                                            <li><a href="shop-list.html">Shop List</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="cart.html">Shopping cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="404.html">404 Error</a></li>
                                        </ul>													
                                    </li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>						
                    </div>
                </div>
                <!-- mobile menu end -->
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-md-3 col-sm-12 nopadding-left">
                <div class="top-detail">
                    <!-- language division start -->
                    <div class="disflow">
                      
                        <div class="expand lang-all disflow">
                            <a href="#">Cá nhân</a>
                            <ul class="restrain language">
                                @if(Auth::check())
                                <li><a href="{{ route('accountmanager') }}">Quản lý tài khoản</a></li>
                                <li><a href="#">Sản phẩm yêu thích</a></li>
                                <li><a href="#">Giỏ hàng</a></li>
                                <li><a href="{{route('get.logout.user')}}">Thoát</a></li>
                                @else 
                                <li><a href="{{route('get.register')}}">Đăng ký</a></li>

                                <li><a href="{{route('get.login')}}">Đăng nhập</a></li>
                            @endif

                            </ul>
                        </div>
                    </div>
                    <!-- language division end -->
                    <!-- addcart top start -->
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="{{ route('get.list.shopping.cart') }}"><i class="icon-bag"></i></a>
                                    <a href="{{ route('get.list.shopping.cart') }}"><span class="cart-quantity">{{ Cart::count() }}</span></a>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="index.html" id="searchform" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" maxlength="128" placeholder="Search product...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search divition end -->
              
                </div>
            </div>
            <!-- top details area end -->
        </div>
    </div>
</header>