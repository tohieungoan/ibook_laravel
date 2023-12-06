
@extends('layouts.app')
@section('content')
<style>
  
    /* CSS để tạo một khoảng cách giữa các sản phẩm trong bảng */
    .table tbody tr:not(:last-child) {
        margin-bottom: 10px;
    }

    .select-all-label {
        cursor: pointer;
    }
    .old-price {
    text-decoration: line-through;
    color: gray;
    font-size: medium;
  
  }
  
  .new-price {
    color: green;
    font-size: large;
  }
</style>

<div class="our-product-area">
    <div class="container">
        <!-- area title start -->
        <div class="area-title">
            <h2>Giỏ Hàng</h2>
        </div>
        <form action="{{ route('post.form.pay') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="select-all">
                            </div>
                        </th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col" style="text-align: center">Giá</th>
                        <th></th>
                        <th scope="col">&nbsp; &nbsp; &nbsp; &nbsp; Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($productsWithInfo as $product)
                    <tr>
                        <th scope="row">#{{ $i }}</th>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input product-checkbox" name="product_check[]" type="checkbox" value="{{ $product['id'] }}|{{ $product['quantity'] }}">
                            </div>
                        </td>
                        <td><a href="">{{ $product['pro_name']}}</a></td>
                        <td><img style="width: 80px; height: 60px;" src="{{ pare_url_file($product['pro_avatar']) }}" alt=""></td>
                        <td class="align-middle" colspan="2">
                            <span class="old-price">
                              {{ number_format( ($product['pro_price'] ) +
                              (($product['pro_price'] * $product['pro_sale']) / 100 ), 0, ',', ',') 
                                 
                              }}đ
                          </span>
                            <span class="new-price">   {{ number_format( ($product['pro_price'] ), 0, ',', ',') 
                                 
                              }}đ</span>
                          </td>
                        <td>
                            <button type="button" class="btn btn-link px-2" onclick="decrementQuantity(this)">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" style="max-width: 7ch; min-width: 5ch;" class="quantity-input" name="quantity[]" value="{{ $product['quantity'] }}" min="1">
                            <button type="button" class="btn btn-link px-2" onclick="incrementQuantity(this)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </td>
                        <td class="">
                            <span class="product-price" value="{{ $product['pro_price'] }}">
                              {{ number_format(($product['pro_price'] * $product['quantity']), 0, ',', ',') }}đ
                            </span>
                          </td>
                        <td>
                            <a href="{{ route('delete.shopping.cart', $product['id']) }}"><i class="fa fa-trash-o"></i>Delete</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
        
            <div class="text-left">
                <div class="mb-3">
                    <h3>Tổng tiền :</h3>
                    <h5 class="total"></h5>
                </div>
            </div>
        
            <div class="text-right">
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Thanh toán</button>
                </div>
            </div>
        </form>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function decrementQuantity(button) {
        var input = button.parentNode.querySelector('.quantity-input');
        var quantity = parseInt(input.value);

        if (quantity > 1) {
            quantity--;
            input.value = quantity;
          
            updateQuantity(input);
            updatePrice(input);
            updateTotal();
        }
    }

    function incrementQuantity(button) {
        var input = button.parentNode.querySelector('.quantity-input');
        var quantity = parseInt(input.value);
   
        quantity++;
        input.value = quantity;
       
        updateQuantity(input);
        updatePrice(input);
        updateTotal();
    }
    function updatePrice(input) {
  // Lấy đối tượng chứa giá sản phẩm
  var priceElement = input.closest('tr').querySelector('.product-price');
  var initialPrice = parseFloat(priceElement.getAttribute('value'));
  var quantity = parseInt(input.value);
  var newPrice = initialPrice * quantity;
  priceElement.textContent = formatCurrency(newPrice);
  

}

    function updateQuantity(input) {
    var checkboxValue = input.parentNode.parentNode.querySelector('.product-checkbox').value;
    var values = checkboxValue.split('|');
    var productId = values[0];
    var quantity = parseInt(input.value);

    $.post(
        "{{ route('updatesoluong') }}",
        {
            productId: productId,
            quantity: quantity,
            _token: '{{ csrf_token() }}' // Add the CSRF token
        },
        function(response) {
            console.log(response); // Handle the response from the server if needed
        }
    ).fail(function(xhr, status, error) {
        console.error(error); // Handle errors if they occur
    });
}
      document.getElementById('select-all').addEventListener('change', function () {
        var checkboxes = document.getElementsByClassName('product-checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
            
        }
        updateTotal()
    });
    // Lắng nghe sự kiện khi các checkbox sản phẩm được thay đổi
    var checkboxes = document.getElementsByClassName('product-checkbox');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', updateTotal);
    }

    // Hàm cập nhật tổng tiền
    function updateTotal() {
        var total = 0;
        var quantities = document.getElementsByName('quantity[]');
        var prices = document.getElementsByClassName('product-price');

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                var quantity = parseInt(quantities[i].value);
                var price = parseInt(prices[i].innerText.replace(/[^\d]/g, '')); // Lấy giá trị số từ chuỗi giá tiền
                total += price;
            }
        }

        // Hiển thị tổng tiền
        var totalElement = document.getElementsByClassName('total')[0];
        totalElement.innerText = formatCurrency(total);
    }

    function formatCurrency(amount) {
        return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    }





</script>

@endsection