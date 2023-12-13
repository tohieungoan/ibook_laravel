<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class lichsudonController extends Controller
{
    public function checkdonhang($action){
      
        $transactions = null;
        switch ($action) {
            case 'dangxuly':
                $transactions = Transaction::where('tr_user_id', Auth::user()->id)
                ->where('tr_status', '1')
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            case 'danggiao':
                $transactions = Transaction::where('tr_user_id', Auth::user()->id)
                ->where('tr_status', '2')
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            case 'danhan':
                $transactions = Transaction::where('tr_user_id', Auth::user()->id)
                ->where('tr_status', '3')
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
    
          
                break;
            case 'dahuy':
                $transactions = Transaction::where('tr_user_id', Auth::user()->id)
                ->where('tr_status', '-1')
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            
            default:
                // Xử lý khi giá trị orderby không khớp với bất kỳ giá trị nào trong danh sách
                break;
        }
        $viewData = [
            'transactions' => $transactions
        ];
        return view('account.purchasehistory',$viewData);
    }
    public function chitietdonhang($id){
        $transaction = Transaction::select('tr_note', 'tr_address', 'tr_phone' , 'tr_total','tr_status')
        ->where('id', $id)
        ->first();
        $product = DB::table('products')
            ->join('orders', 'products.id', '=', 'orders.or_product_id')
            ->select('products.pro_name', 'products.pro_avatar','orders.or_qty','orders.or_price','orders.or_sale')
            ->where('orders.or_transaction_id', $id)
            ->get();
            return view('shopping.return')->with('transaction',$transaction)->with('product',$product);

    }
}
