@extends('layouts.app')
@section('content')
<style>
	.comment {
  display: flex;
  align-items: flex-start;
  margin-bottom: 10px;
}

.avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 10px;
}

.content {
  flex-grow: 1;
}

.name {
  font-weight: bold;
}

.text {
  margin-top: 15px;
}
.star {
  color: gray;
}

.star.active {
  color: yellow;
}
.star.activ2 {
  color: yellow;
}
</style>
@if(isset($exists))
    <div class="alert alert-danger" style="text-align: center">
        {{ $exists }}
    </div>
@endif
@if(isset($productDetail))
		<!-- breadcrumbs area start -->
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
								<li class="category3"><span>Chi tiết sản phẩm</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- product-details Area Start -->
		<div class="product-details-area">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<a href="#">
                               
                                      <div style=" height: 450px; overflow: hidden;">
									<img id="zoom1" style="width: 100%; height: 100%; object-fit: cover;" src="{{ pare_url_file($productDetail->pro_avatar) }}" data-zoom-image="{{ pare_url_file($productDetail->pro_avatar) }}" alt="big-1">
								</div>
								</a>
							</div>
			
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12" style="">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
                               
									<h2 class="product-name"><a href="#">{{ $productDetail->pro_name }}</a></h2>
									<div class="rating-price">	
										<div class="pro-rating">
											<span href="#"><i class="fa fa-star"></i></span>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>
										<div class="price-boxes">
											<span class="new-price">{{ $productDetail->pro_price }} VND</span>
										</div>
									</div>
									<div class="product-desc">
										<p>{{ $productDetail->pro_description_seo }}</p>
									</div>
									<p class="availability in-stock">Tình trạng: <span>Còn hàng</span></p>
									<div class="actions-e">
										<div class="action-buttons-single">
											<div class="inputx-content">
												<label for="qty">Số lượng:</label>
												<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
											</div>
											<div class="add-to-cart">
												<a href="#">Thêm vào giỏ</a>
											</div>
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
												</div>									
											</div>
										</div>
									</div>
									<div class="singl-share">
                                        <a href="#"><img src="img/single-share.png" alt=""></a>
                                    </div>
								</div>
							</div>
                            @endif
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="single-product-tab">
						  <!-- Nav tabs -->
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab">Mô tả</a></li>
							<li class=""><a href="#messages" data-toggle="tab"> Đánh giá ({{ $count}})</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-tab-content">
									<div id="editorContent">	</div>
									
								
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages">
								<div class="single-post-comments col-md-10 col-md-offset-1">
									<div class="comments-area">
										<div class="comments-list">
											<ul id="commentList">
												<li>
													
														
														@if($comment!=null)
														@foreach($comment as $listcomment)
														<div class="comments-details">
														<div class="comment">
															@if($listcomment->avatar!=null)
															<img class="avatar" src="{{ pare_url_file($listcomment->avatar) }}" alt="Avatar">
															<b><span class="name">{{ $listcomment->name }} </span></b>
															@else
															<img class="avatar" src="path/to/avatar.jpg" alt="Avatar">
															<b><span class="name">{{ $listcomment->name }} </span></b>
	
															@endif
														<div class="comments-content-wrap"  style="max-width: 60%">
															<span>
																@php
																$ratedStars = $listcomment->star; // Số sao đã đánh giá
																$starconlai = 5 -$ratedStars;
															@endphp
																<b><span class="name">    @for ($i = 1; $i <= $ratedStars; $i++)
																	<span class="star activ2" ><i class="fa fa-star"></i></span>
																@endfor 
																@for ($i = 1; $i <= $starconlai; $i++)
																<span class="star" ><i class="fa fa-star"></i></span>
																@endfor 
															</span></b>
																<span class="post-time">{{ $listcomment->created_at }}</span>
															</span>
															<p class="content">{{ $listcomment->content }}</p>
														</div>
														</div>
													</div>
													@endforeach
													@endif
													
												</li>									
											</ul>
										</div>
									</div>
									@if(Auth::check())
									<div class="comment-respond">
			
										<form id="commentForm" action="{{ route('postcomment') }}" method="POST">
											@csrf
											<div class="row">
												<div class="col-md-12">
													<div class="comment">
														@if($profile->avatar!=null)
														<img class="avatar" src="{{ pare_url_file($profile->avatar) }}" alt="Avatar">

														@else
														<img class="avatar" src="path/to/avatar.jpg" alt="Avatar">
														

														@endif
														<div class="content">
														  <p class="name">{{ $profile->name }}</p>

														</div>
													</div>
													<input type="hidden" name="layngoisao" value="">
													<div class="pro-rating">
														<span class="star" data-value="1"><i class="fa fa-star"></i></span>
														<span class="star" data-value="2"><i class="fa fa-star"></i></span>
														<span class="star" data-value="3"><i class="fa fa-star"></i></span>
														<span class="star" data-value="4"><i class="fa fa-star"></i></span>
														<span class="star" data-value="5"><i class="fa fa-star"></i></span>
													</div>
												</div>
												<div class="col-md-12 comment-form-comment">
													<p>Để lại bình luận</p>
													<textarea name="content" id="message" cols="30" rows="10"></textarea>
											
													<input type="submit" value="Submit">
													@else
													<a class="btn btn-primary" href="{{route('get.login')}}">Đăng nhập</a>
													@endif
												</div>
											</div>
										</form>
									</div>						
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
		<!-- product-details Area end -->

    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var ckeditorContent = "{!! addslashes($productDetail->pro_content) !!}"; // Sử dụng addslashes để xử lý các ký tự đặc biệt

    // Gán nội dung CKEditor vào phần tử HTML
    $('#editorContent').html(ckeditorContent);
</script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
  var stars = document.querySelectorAll('.star');
  var inputElement = document.querySelector('input[name="layngoisao"]');

  stars.forEach(function(star) {
    star.addEventListener('click', function() {
      var value = this.getAttribute('data-value');

      stars.forEach(function(star) {
        var starValue = star.getAttribute('data-value');
        if (starValue <= value) {
          star.classList.add('active');
        } else {
          star.classList.remove('active');
        }
      });

      inputElement.value = value; // Gán giá trị của ngôi sao vào phần tử input
    });
  });
});
  </script>

<script>
  $(document).ready(function() {
    $('#commentForm').submit(function(e) {
        e.preventDefault(); // Chặn hành vi mặc định của sự kiện submit

        var layngoisaoValue = $('input[name="layngoisao"]').val();
        var contentValue = $('#message').val();

        $.post(
            "{{ route('postcomment') }}",
            {
                layngoisao: layngoisaoValue,
                content: contentValue,
                _token: '{{ csrf_token() }}'
            },
            function(response) {
                if(response.message=="ok"){
					// Sau khi comment được gửi
// Lấy giá trị của các trường comment
var starcheck = layngoisaoValue;
var starsau = 5 - starcheck;

// Tạo một thẻli mới chứa nội dung comment
var newComment = document.createElement('li');
newComment.innerHTML = `
<div class="comments-details">
  <div class="comment">
    @if($profile->avatar!=null)
    <img class="avatar" src="{{ pare_url_file($profile->avatar) }}" alt="Avatar">
    @else
    <img class="avatar" src="path/to/avatar.jpg" alt="Avatar">
    @endif
    <b><span class="name">{{ $profile->name }} </span></b>
    <div class="comments-content-wrap" style="max-width: 60%">
      <span>
        <b>
          <span class="name">
            @for ($i = 1; $i <= `starcheck `; $i++)
              <span class="star activ2"><i class="fa fa-star"></i></span>
            @endfor
            @for ($i = 1; $i <=` starsau`; $i++)
              <span class="star"><i class="fa fa-star"></i></span>
            @endfor
          </span>
        </b>
        <span class="post-time">{{ date('Y-m-d H:i:s') }}</span>
      </span>
      <p class="content">${contentValue}</p>
    </div>
  </div>
</div>
`;

var commentList = document.getElementById('commentList');
commentList.appendChild(newComment);

// Xóa nội dung trong trường comment sau khi gửi
document.getElementById('message').value = '';
				}
            }
        ).fail(function(xhr, status, error) {
            console.error(error);
        });
    });
});
</script>
@stop
