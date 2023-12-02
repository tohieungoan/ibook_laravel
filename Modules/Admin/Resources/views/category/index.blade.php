@extends('admin::layouts.master')

@section('content')
<div class="page-header"><ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
    <li><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
    <li class="active">Danh sách</li>
  </ol></div>
<h2>Quản lí danh mục <a class="pull-right" href="{{ route('admin.get.create.category') }}"><i class="fa-solid fa-plus"></i></a></h2>
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
        @if(isset($categories))
            @foreach($categories as $category)
               <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->c_name}}</td>
            <td>{{$category->c_title_seo}}</td>
            <td><a class="label {{$category->getStatus($category->c_active)['class']}}" href="{{ route('admin.get.action.category',['active',$category->id]) }}">{{$category->getStatus($category->c_active)['name']}}</a></td>
         

            <td>
              <a style="padding: 5px 10px ; border : 1px solid #999; font-size: 12px" href="{{route('admin.get.edit.category',$category->id)}}"><i class="fas fa-pen-square" style="font-size: 11px"></i> Cập nhật</a>
              <a style="padding: 5px 10px ; border : 1px solid #999; font-size: 12px" href="{{route('admin.get.action.category',['delete',$category->id])}}"><i class="fas fa-trash" style="font-size: 11px"></i> Xóa</a>

            </td>
          </tr>
            @endforeach 
       @endif

        </tbody>
      </table>
  </div> 
@stop