@extends('admin::layouts.master')

@section('content')
<div class="page-header"><ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
    <li><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
    <li class="active">Danh sách</li>
  </ol></div>
  <div class="row">
    <div class="col-sm-12">
      <form action="" class="form-inline" style="margin-bottom: 20px">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm..." value="{{ \Request::get('name') }}">
      </div>
      <div class="form-group">
        <select name="cate" id="" class="form-control" >

          <option value="">Danh mục</option>
          @if(isset($categories))
          @foreach($categories as $category)
              <option value="{{$category->id}}" {{ \Request::get('cate')==$category->id ? "selected='selected'" : "" }}>{{$category->c_name}}</option>
          @endforeach
      @endif
        </select>
      </div>
      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>
<h2>Quản lí sản phẩm <a class="pull-right" href="{{ route('admin.get.create.product') }}"><i class="fa-solid fa-plus"></i></a></h2>
<div class="table-responsive"> 
    <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Hình ảnh</th>

            <th>Trạng thái</th>
            <th>Nổi bật</th>

            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>

          @if(isset($products))
          @foreach($products as $product)
             <tr>
          <td>{{$product->id}}</td>
          <td>{{$product->pro_name}}
          <ul style="padding-left: 15px">
            <li>{{ $product->pro_price }}₫</span></li>
            <li>{{ $product->pro_sale }}%<span  class="fa-solid fa-piggy-bank"></span></li>
          </ul>
          </td>
          <td>{{isset($product->category->c_name)? $product->category->c_name :'[N\A]'}}</td>
          
          <td>
            <img src="{{ pare_url_file($product->pro_avatar) }}" alt="" class="img img-responsive" style="width: 80px">
          </td>

          <td><a  class="label {{$product->getStatus($product->pro_active)['class']}}" href="{{ route('admin.get.action.product',['active',$product->id]) }}">{{$product->getStatus($product->pro_active)['name']}}</a></td>
          <td><a class="label {{$product->getHot($product->pro_hot)['class']}}" href="{{ route('admin.get.action.product',['hot',$product->id]) }}">{{$product->getHot($product->pro_hot)['name']}}</a></td>

          <td>
            <a style="padding: 5px 10px ; border : 1px solid #999; font-size: 12px" href="{{route('admin.get.edit.product',$product->id)}}"><i class="fas fa-pen-square" style="font-size: 11px"></i> Cập nhật</a>
            <a style="padding: 5px 10px ; border : 1px solid #999; font-size: 12px" href="{{route('admin.get.action.product',['delete',$product->id])}}"><i class="fas fa-trash" style="font-size: 11px"></i> Xóa</a>

          </td>
        </tr>
          @endforeach 
     @endif 
        
   
        </tbody>
      </table>
      {{ $products->links('components.pagination')  }}
      
  </div> 
@stop