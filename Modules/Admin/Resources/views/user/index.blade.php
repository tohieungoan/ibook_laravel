@extends('admin::layouts.master')

@section('content')
<div class="page-header"><ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
    <li><a href="">Thành viên</a></li>
    <li class="active">Danh sách</li>
  </ol></div>
<h2>Quản lí thành viên </h2>
<div class="table-responsive"> 
    <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên nguời dùng</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        @if (isset($users))
    @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td></td>
            <td><a class="label {{$user->getStatus($user->active)['class']}}" href="{{ route('admin.get.action.user',['active',$user->id]) }}">{{$user->getStatus($user->active)['name']}}</a></td>
            <td>
                <a style="padding: 5px 10px; border: 1px solid #999; font-size: 12px" href="{{route('admin.get.edit.user', $user->id)}}">
                    <i class="fas fa-pen-square" style="font-size: 11px"></i> Cập nhật
                </a>
                <a style="padding: 5px 10px; border: 1px solid #999; font-size: 12px" href="{{route('admin.get.action.user', ['delete', $user->id])}}">
                    <i class="fas fa-trash" style="font-size: 11px"></i> Xóa
                </a>
            </td>
        </tr>
    @endforeach
@endif

        </tbody>
      </table>
  </div> 
@stop