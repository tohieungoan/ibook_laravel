@extends('layouts.app')
@section('content')
<div class="our-product-area">
    <div class="container">
        <!-- area title start -->
        <div class="area-title">
            <h2>Giỏ Hàng</h2>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
             
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền </th>
        
                <th scope="col">Thao tác</th>
        
              </tr>
            </thead>
            <tbody>
                <?php $i= 1 ?>
                @foreach($products as $product)
           
              <tr>
                <th scope="row">#{{ $i }}</th>
                <td><a href="">{{ $product->name }}</a></td>
                <td><img style="width: 80px ; height: 60px;" src="{{ pare_url_file($product->options->avatar) }}" alt=""></td>
                <td>{{ number_format($product->price,0,',',',') }}đ</td>
                <td>{{ $product->qty }}</td>
                <td>{{ number_format($product->qty * $product->price,0,',',',') }}đ</td>
<td>
    <a href=""><i class="fa fa-pencil"></i>Edit</a>
    <a href=""><i class="fa fa-trash-o"></i>Delete</a>

</td>
              </tr>
           <?php $i ++ ?>
              @endforeach
            </tbody>
          </table>
          <h5 class="pull-right">Tổng tiền cần thanh toán {{ Cart::subtotal() }}     <a href="{{ route('get.form.pay') }}" class="btn-success btn">Thanh toán</a></h5>
      
    </div>

</div>


@stop