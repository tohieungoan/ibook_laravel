@extends('admin::layouts.master')

@section('content')
<div class="page-header"><ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
    <li><a href="">Đơn hàng</a></li>
    <li class="active">Danh sách</li>
  </ol></div>
<h2>Quản lí đơn hàng</h2>
<div class="table-responsive"> 
    <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên danh mục</th>
            <th>Title Seo</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
    

        </tbody>
      </table>
  </div> 
@stop