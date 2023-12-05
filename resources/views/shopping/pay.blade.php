@extends('layouts.app')
@section('content')
<style>.old-price {
  text-decoration: line-through;
  color: gray;
  font-size: medium;

}

.new-price {
  color: green;
  font-size: large;
}</style>
<link href="{{ asset('css2/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="container-inner">
          <ul>
            <li class="home">
              <a href="index.html">Giỏ hàng</a>
              <span><i class="fa fa-angle-right"></i></span>
            </li>
            <li class="category3"><span>Đặt hàng</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<section class="section-content padding-y">
  <div class="container">
  
  <div class="row">
    <main class="col-md-9">
      
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="h5">Giỏ hàng</th>
            <th scope="col">   số lượng </th>
            <th></th>
            <th scope="col">Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0; ?>
          @foreach($productsWithInfo as $product)
          <tr>
            <th scope="row">
              <div class="d-flex align-items-center">
                <img src="{{ pare_url_file($product['pro_avatar']) }}" class="img-fluid rounded-3"
                  style="width: 120px;" alt="">
                <div class="flex-column ms-4">
                  <p class="mb-2">{{ $product['pro_name'] }}</p>
                </div>
              </div>
            </th>
          
            <td class="align-middle">
              <div class="d-flex flex-row">
                <input id="form1" min="0" name="quantity" value="{{ $product['quantity'] }}" type="number" class="form-control form-control-sm" style="width: 50px; background-color: white; border: none" readonly />

               
              </div>
            </td>
            <td class="align-middle" colspan="2">
              <span class="old-price">
                {{ number_format( ($product['pro_price'] * $product['quantity']) +
                (($product['pro_price'] * $product['pro_sale']) / 100 * $product['quantity']), 0, ',', ',') 
                   
                }}đ
            </span>
            <?php  $total = $total +  ($product['pro_price'] * $product['quantity'])  ; ?>
              <span class="new-price">    {{  number_format( ($product['pro_price'] * $product['quantity']), 0, ',', ',') 
                   
                }}đ</span>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>

  
  <div class="card-body border-top">
    <a href="#" class="btn btn-primary float-md-right"> Đặt hàng<i class="fa fa-chevron-right"></i> </a>
    <a href="{{ route('get.list.shopping.cart') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i>Tiếp tục mua sắm  </a>
  </div>	
  </div> <!-- card.// -->
  
  <div class="alert alert-success mt-3">
    <p class="icontext"><i class="icon text-success fa fa-truck"></i>Đơn hàng sẽ được giao trong khoản 3 đến 5 ngày</p>
  </div>
  
    </main> <!-- col.// -->
    <aside class="col-md-3">
      <div class="card mb-3">
        <div class="card-body">
        <form>
          <div class="form-group">
            <label>Have coupon?</label>
            <div class="input-group">
              <input type="text" class="form-control" name="" placeholder="Coupon code">
              <span class="input-group-append"> 
                <button class="btn btn-primary">Apply</button>
              </span>
            </div>
          </div>
        </form>
        </div> <!-- card-body.// -->
      </div>  <!-- card .// -->
      <div class="card">
        <div class="card-body">
            <dl class="dlist-align">
              <dt>Tổng tiền:</dt>
              <dd class="text-right">
                {{  number_format($total , 0, ',', ',') 
                   
              }}đ</dd>
            </dl>
            <dl class="dlist-align">
              <dt>Giảm giá:</dt>
              <dd class="text-right"></dd>
            </dl>
            <dl class="dlist-align">
              <dt>Tiền thanh toán (cả thuế):</dt>
              <dd class="text-right  h5"><strong> {{  number_format($total+($total*0.1) , 0, ',', ',') 
                   
              }}</strong></dd>
            </dl>
            <hr>
            <p class="text-center mb-3">
              <img src="{{ asset('img/payments.png') }}" height="26">
            </p>
            
        </div>
      </div>  
    </aside>
  </div>
  
  </div> 
  </section>
</div>
		
@stop