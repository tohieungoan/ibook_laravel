<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaction;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $transactions = Transaction::query();
        if ($request->idtrans) {
            $transactions->where('id', $request->idtrans);
        }
    
        $transactions = $transactions->orderByDesc('id')->paginate(10);
    
        $viewData = [
            'transactions' => $transactions
        ];
    
        return view('admin::transaction.index', $viewData);
    }
    public function action(Request $request)
    {
        $transactionId = $request->input('id');
        $transaction = Transaction::find($transactionId);
        if ($transaction) {
            if($transaction->tr_status==3){
                $transaction->tr_status = -1;
            }
    else {
        $transaction->tr_status +=1;
    }
        }
        $transaction->save();
        return response()->json(['success' =>$transaction->tr_status]);
    }
}
