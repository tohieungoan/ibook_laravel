<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
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
}