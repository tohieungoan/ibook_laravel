<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;
use App\Models\Profile;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function productDetail(Request $request){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);

        $profile = null;
        if($id = array_pop($url)){
            $productDetail = Product::where('pro_active',Product::STATUS_PUBLIC)->FIND($id); 
            $star = 0;
            if ($productDetail) {
                $comments2 = DB::table('table_comment as comment')
                ->join('products', 'comment.id_product', '=', 'products.id')
                ->select('comment.star')
                ->where('comment.id_product', $productDetail->id)
                ->get();
            
                // Tính tổng số sao đánh giá
                $star = $comments2->sum('star');
                // Lấy số lượng đánh giá
                $commentCount = $comments2->count();
                if($commentCount!=0){
                    $star = $star / $commentCount;
                }
               
            
                // Hiển thị thông tin số sao và số lượng đánh giá
    
            } else {



            }



            $viewData = [
                'productDetail' => $productDetail,
                'star'=>$star
            ];
            // $comments = DB::table('table_comment')
            // ->join('profile', 'profile.id_account', '=', 'table_comment.id_account')
            // ->select('profile.name', 'profile.avatar', 'table_comment.star', 'table_comment.content', 'table_comment.created_at')
            // ->where('table_comment.id_product', $id)
            // ->get();


            $comments = DB::table('table_comment')
            ->join('profile', 'profile.id_account', '=', 'table_comment.id_account')
            ->select('profile.name', 'profile.avatar', 'table_comment.star', 'table_comment.content', 'table_comment.created_at', DB::raw('COUNT(*) as comment_count'))
            ->where('table_comment.id_product', $id)
            ->groupBy('table_comment.id_account', 'profile.name', 'profile.avatar', 'table_comment.star', 'table_comment.content', 'table_comment.created_at')
            ->get();
            $count = 0;
            $count = count($comments);

            if (Auth::check()) {
                $userId = Auth::user()->id;
            } else {
                $userId = -1;
            }

         $profile = Profile::select('*')
        ->where('id_account', $userId)
        ->first();
            $transactionExists = DB::table('transactions')
            ->join('orders', 'transactions.id', '=', 'orders.or_transaction_id')
            ->where('transactions.tr_user_id', $userId)
            ->where('transactions.tr_status', '3') 
            ->where('orders.or_product_id', $id)
            ->exists();
            if ($transactionExists) {
        
                return view('product.detail', $viewData)->with('exists','yes')->with('profile',$profile)->with('comment',$comments)->with('count',$count);
            } else {
               
                return view('product.detail', $viewData)->with('exists','no')->with('profile',$profile)->with('comment',$comments)->with('count',$count);
            }
         
        }
    }
    
}
