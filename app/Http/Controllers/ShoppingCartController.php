<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function addProduct (Request $request , $id){
      $product = Product::select('pro_name','id','pro_price','pro_sale','pro_avatar')->find($id);
      if(!$product) return redirect('/');
      $price = $product->pro_price;
      if($product->pro_sale){
        $price = $price * (100 - $product->pro_sale)/100;
      }
\Cart::add(['id' => $id, 
'name' => $product->pro_name, 
'qty' => 1,
 'price' => $product->pro_price, 
'options' => [
    'avatar' => $product->pro_avatar,
    'sale' =>$product->pro_sale,
    'price_old' => $product->pro_sale
],
                ]);
return redirect()->back();
    }
    public function getListShoppingCart(){
        $products = \Cart::content();
        return view('shopping.index', compact('products'));
    }
    public function deleteProduct($key){
        \Cart::remove($key);
        return redirect()->back();
    }
    public function getFormPay(){
        $products = \Cart::content();
     return view('shopping.pay', compact('products'));
    }
    public function saveInfoShoppingCart(Request $request){

    }
}
