<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Profile;
use App\Models\User;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Order;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function addProduct(Request $request, $id)
    {
        $product = Product::select('pro_name', 'id', 'pro_price', 'pro_sale', 'pro_avatar')->find($id);
        if (!$product) {
            return redirect('/');
        }
    
        $userId = Auth::user()->id;
        $cart = Cart::where('id_account', $userId)
                    ->where('id_product', $id)
                    ->first();
    
        if ($cart) {
            $cart->qty += 1;
        } else {
            $cart = new Cart();
            $cart->id_account = $userId;
            $cart->id_product = $id;
            $cart->qty = 1;
        }
    
        $cart->save();
        return redirect()->back();
    }
    public function getListShoppingCart()
    {
        $userId = Auth::user()->id;
        $cartItems = Cart::select('id_product', 'qty')->where('id_account', $userId)->get();
    
        $productIds = $cartItems->pluck('id_product')->toArray();
        $products = Product::whereIn('id', $productIds)->get();
    
        $productsWithInfo = [];
        foreach ($cartItems as $cartItem) {
            $product = $products->firstWhere('id', $cartItem->id_product);
    
            if ($product) {
                $productWithInfo = $product->toArray();
                $productWithInfo['quantity'] = $cartItem->qty;
                $productsWithInfo[] = $productWithInfo;
            }
        }
    // dd($productsWithInfo);
        return view('shopping.index', compact('productsWithInfo'));
    }
  
    public function deleteProduct($id)
    {
        $userId = Auth::user()->id;
        
        Cart::where('id_account', $userId)
            ->where('id_product', $id)
            ->delete();
    
        return redirect()->back();
    }
    public function PostFormPay(Request $request) {
        $userId = Auth::user()->id;
        $profile= Profile::where('id_account', $userId)->first();
        if($profile){
            $listproduct = $request->product_check;
            $productsWithInfo = [];
        
            foreach ($listproduct as $productId) {
                $values = explode('|', $productId);
                $id = $values[0];
                $quantity = $values[1];
                
                $product = Product::find($id);
        
                if ($product) {
                    $productWithInfo = $product->toArray();
                    $productWithInfo['quantity'] = $quantity;
                    $productsWithInfo[] = $productWithInfo;
                }
            }
            return view('shopping.pay', compact('productsWithInfo'));
        }
       $user = User::where('id', $userId)->first();

return view('account.profile')->with('message', 'Bạn cần điền thông tin về tài khoản.')->with('user', $user);
      
    }
 
    public function updatesoluong(Request $request)
    {
        $previousURL = $request->headers->get('referer');
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
    
        $userId = Auth::id();
    
        Cart::where('id_account', $userId)
            ->where('id_product', $productId)
            ->update(['qty' => $quantity]);
    
            return redirect()->to($previousURL);
    }
public function taodonhang (Request $request){
   
    $productsWithInfo = json_decode($request->productsWithInfo, true);
    $userId = Auth::user()->id;
    
    $profile = Profile::select('note', 'location', 'phone')
        ->where('id_account', $userId)
        ->first();
    
    $transaction = new Transaction();
    $transaction->tr_user_id = $userId;
    $transaction->tr_note = $profile->note;
    $transaction->tr_total =$request->totalafftercoupon;

    $transaction->tr_address = $profile->location;
    $transaction->tr_phone = $profile->phone;
    $transaction->save();
    $transactionId = $transaction->id;
    
    foreach ($productsWithInfo as $product) {
        $order = new Order();
        $order->or_transaction_id = $transactionId;
        $order->or_product_id = $product['id'];
        $order->or_qty = $product['quantity'];
        $order->or_price = $product['pro_price'];
        $order->or_sale = $product['pro_sale'];
        $order->save();
        Cart::where('id_account', $userId)
        ->where('id_product', $product['id'])
        ->delete();
    }
    
    $urlredirectVnPay= $this->vnpay_Payment($transactionId, $request->input('totalafftercoupon'));
    return redirect()->to($urlredirectVnPay);

}
    protected function vnpay_Payment($Purchase_order_ID, $TotalAmount)
    {

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/payment-successful";
        $vnp_TmnCode = "JP7JDW60"; //Mã website tại VNPAY 
        $vnp_HashSecret = "GVPMKMOLBSZEDTQITCTPQAICOYIVQYDU"; //Chuỗi bí mật

        $vnp_TxnRef = $Purchase_order_ID; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Hoàn Thành Thanh Toán Với Hóa Đơn Của EMAKETXPRESS";
        $vnp_OrderType = "EMAKETXPRESS SHOP";
        $vnp_Amount = $TotalAmount * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            return $vnp_Url;
        }
    }
    public function showpayment(Request $request)
    {
        $idtrans = $request->input('vnp_TxnRef');
    $vnp_Amount = $request->input('vnp_Amount');
    $vnp_ResponseCode = $request->input('vnp_ResponseCode');
    $vnp_TransactionStatus = $request->input('vnp_TransactionStatus');
    
    $transaction = Transaction::select('tr_note', 'tr_address', 'tr_phone' , 'tr_total')
        ->where('id', $idtrans)
        ->first();
        $product = DB::table('products')
            ->join('orders', 'products.id', '=', 'orders.or_product_id')
            ->select('products.pro_name', 'products.pro_avatar','orders.or_qty','orders.or_price','orders.or_sale')
            ->where('orders.or_transaction_id', $idtrans)
            ->get();



    if ($vnp_ResponseCode == '00' && $vnp_TransactionStatus == '00') {
        Transaction::where('id', $idtrans)
        ->update(['tr_status' => '3']);
      
return view('shopping.return')->with('paymentsuccess', 'Thanh toán thành công.')->with('vnp_Amount', $vnp_Amount)->with('transaction',$transaction)->with('product',$product);

    } else {
        Transaction::where('id', $idtrans)
        ->update(['tr_status' => '-1']);
        return view('shopping.return')->with('paymentfail', 'Thanh toán thất bại.')->with('vnp_Amount', $vnp_Amount)->with('transaction',$transaction)->with('product',$product);

    }
    }
}