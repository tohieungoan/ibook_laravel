
@extends('layouts.app')
@section('content')
@if(isset($paymentsuccess))
    <div class="alert alert-success" style="text-align: center">
        {{ $paymentsuccess }}
    </div>
@endif

@if(isset($paymentfail))
    <div class="alert alert-danger" style="text-align: center">
        {{ $paymentfail }}
    </div>
@endif


<link href="{{ asset('css2/bill.css') }}" rel="stylesheet" type="text/css"/>

<!------ Include the above in your HEAD tag ---------->

<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
         
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Danh sách sản phẩm <div class="pull-right"></div>
                        </div>
                        <div class="panel-body">

                            @foreach($product as $productdetail)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ pare_url_file($productdetail->pro_avatar) }}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{ $productdetail->pro_name }}</div>
                                    <div class="col-xs-12"><small>Số lượng:<span>{{ $productdetail->or_qty }}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>{{  number_format( ($productdetail->or_qty)*$productdetail->or_price, 0, ',', ',') 
                   
                                    }}<span>đ</span></h6>
                                </div>
                            </div>
                            @endforeach
                  
                         
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Bạn đã tiết kiệm:</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>
        
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Số tiền:</strong>
                                    <div class="pull-right"><span>    {{  number_format( $vnp_Amount, 0, ',', ',') 
                   
                                    }}đ</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Địa chỉ</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Địa chỉ nhận hàng</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tên:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" readonly class="form-control" name="name" value="{{ Auth::user()->name }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" readonly name="address" class="form-control" value="{{ $transaction['tr_address'] }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Note:</strong></div>
                                <div class="col-md-12">
                                    <textarea readonly name="note" class="form-control" id="" cols="30" rows="5">{{ $transaction['tr_note'] }}</textarea>
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input readonly type="text" name="phone_number" class="form-control" value="{{ $transaction['tr_phone'] }}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" readonly value="{{ Auth::user()->email }}" /></div>
                            </div>
                        </div>
                    </div>
               
                </div>
                
                </form>
                
            </div>
            <div class="row cart-footer">
                <a href="{{ route('home.index') }}" class="btn btn-primary">Back</a>
        </div>
        
    </div>
   
@stop