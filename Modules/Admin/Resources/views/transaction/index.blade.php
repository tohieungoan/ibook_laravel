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
            <th>Tổng tiền</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Trạng thái</th>
          </tr>
        </thead>
        <form action="" class="form-inline">
          <div class="input-group" style="display: flex">
            <input type="number" style="width: 30%; margin-right: 20px" class="form-control" name="idtrans" placeholder="Tìm kiếm..." value="{{ request()->input('idtrans') }}">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </form>
        <tbody>
          @if (isset($transactions))
          @foreach ($transactions as $transaction)
              <tr>
                  <td>{{$transaction->id}}</td>
                  <td>    {{  number_format( $transaction->tr_total, 0, ',', ',') 
                   
                  }}đ</td>
              
                  <td>{{$transaction->tr_phone}}</td>
                  <td>{{$transaction->tr_address}}</td>
                  <td>
                    <a href="#" class="transaction-link status-link" data-transaction-id="{{ $transaction->id }}">
                      {{ $transaction->tr_status }}
                  </a>
                </td>
               
              </tr>
          @endforeach
      @endif

        </tbody>
      </table>
      {{ $transactions->links('components.pagination')  }}
  </div> 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.transaction-link').click(function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định khi nhấp vào liên kết

            var transactionId = $(this).data('transaction-id');
var url = '{{ route('admin.get.action.transaction', ['id' => ':transactionId']) }}';
              // url = url.replace(':transactionId', transactionId);

            // Thực hiện yêu cầu POST bằng Ajax
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    id: transactionId
                },
                success: function(response) {
                  $('.status-link[data-transaction-id="' + transactionId + '"]').text(response.success);
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi (nếu cần)
                }
            });
        });
    });
</script>
@stop