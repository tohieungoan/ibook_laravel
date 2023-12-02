@extends('layouts.app')
@section('content')

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
								<li class="category3"><span>Liên hệ</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- contact-details start -->
		<div class="main-contact-area">
			<div class="container">
				<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="contact-us-area">
							<!-- google-map-area start -->
							<div class="google-map-area">
								<!--  Map Section -->
								<div id="contacts" class="map-area">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d239.7279427354961!2d108.25219934544423!3d15.979796062283702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108fabe29e17%3A0xadcc4501658397d3!2zxJDDtG5nIFRyw6AgOCwgTmfFqSBIw6BuaCBTxqFuLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1699196800621!5m2!1sen!2s" id="map" class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>

							</div>
							<!-- google-map-area end -->
							<!-- contact us form start -->
							<div class="contact-us-form">
								<div class="sec-heading-area">
									
								</div>
								<div class="contact-form">
									<span class="legend">Thông tin liên hệ</span>
									<form action="" method="post">
										@csrf
										<div class="form-top">
										
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Họ tên <sup>*</sup></label>
												<input type="text" name="c_name" class="form-control" required>
											</div>
										
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Email <sup>*</sup></label>
												<input type="email" name="c_email" class="form-control" required>
											</div>
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Tiêu đề <sup>*</sup></label>
												<input type="text" name="c_title" class="form-control" required>
											</div>											
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Số điện thoại <sup>*</sup></label>
												<input type="text" name="c_phone" class="form-control" required>
											</div>	
											<div class="form-group col-sm-12 col-md-12 col-lg-10">
												<label>Nội dung <sup>*</sup></label>
												<textarea name="c_content" class="yourmessage" required></textarea>
											</div>												
										</div>
										<div class="submit-form form-group col-sm-12 submit-review">
											<p><sup>*</sup> Required Fields</p>
											<button class="add-tag-btn">Gửi thông tin</button>
										</div>
									</form>
								</div>
							</div>
							<!-- contact us form end -->
						</div>					
					</div>
				</div>
			</div>	
		</div>
	
@stop