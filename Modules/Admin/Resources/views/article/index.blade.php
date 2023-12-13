@extends('admin::layouts.master')

@section('content')
<div class="page-header"><ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
    <li><a href="{{ route('admin.get.list.article') }}">Bài viết</a></li>
    <li class="active">Danh sách</li>
  </ol></div>


  <div class="row">
    <div class="col-sm-12">
      <form action="" class="form-inline" style="margin-bottom: 20px">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Tên bài viết..." value="{{ \Request::get('name') }}">
      </div>
  
      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>
<h2>Quản lí bài viết <a class="pull-right" href="{{ route('admin.get.create.article') }}"><i class="fa-solid fa-plus"></i></a></h2>
<div class="table-responsive"> 
    <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên bài viết</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>

            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        @if(isset($articles))
            @foreach($articles as $article)
               <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->a_name}}</td>
            <td>{{$article->a_description}}</td>
            <td><a class="label {{$article->getStatus($article->a_active)['class']}}" href="{{ route('admin.get.action.article',['active',$article->id]) }}">{{$article->getStatus($article->a_active)['name']}}</a></td>
            
            <td>{{$article->created_at}}</td>
            
            <td>
              <a  style="padding: 5px 10px ; border : 1px solid #999; font-size: 12px" href="{{route('admin.get.edit.article',$article->id)}}"><i class="fas fa-pen-square" style="font-size: 11px"></i> Cập nhật</a>
              <a style="padding: 5px 10px ; border : 1px solid #999; font-size: 12px" href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="fas fa-trash" style="font-size: 11px"></i> Xóa</a>

            </td>
          </tr>
            @endforeach 
       @endif
       
        
   
        </tbody>
      </table>
      {{ $articles->links('components.pagination')  }}
      
  </div> 
@stop