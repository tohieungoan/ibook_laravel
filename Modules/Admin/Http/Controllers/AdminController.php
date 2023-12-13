<?php

namespace Modules\Admin\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getdata()
    {
        $currentMonth = now()->format('Y-m');
        $daysInMonth = date('t');
        
        $dailyRevenue = [];
        $totalRevenue = 0;
        
        // Inisialisasi seluruh tanggal dalam bulan dengan nilai 0
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = sprintf("%s-%02d", $currentMonth, $day);
            $dailyRevenue[$date] = 0;
        }
        
        $revenues = Transaction::join('orders', 'transactions.id', '=', 'orders.or_transaction_id')
            ->where(DB::raw('DATE_FORMAT(transactions.created_at, "%Y-%m")'), $currentMonth)
            ->where('transactions.tr_status', 1)
            ->select(DB::raw('DATE(transactions.created_at) as date'), DB::raw('SUM((orders.or_qty * orders.or_price) - (orders.or_qty * orders.or_price * orders.or_sale / 100)) as revenue'))
            ->groupBy(DB::raw('DATE(transactions.created_at)'))
            ->get();
        
        foreach ($revenues as $revenue) {
            $date = $revenue->date;
            $revenueAmount = $revenue->revenue;
        
            // Lưu doanh thu vào mảng
            $dailyRevenue[$date] = $revenueAmount;
        
            // Tính tổng doanh thu trong tháng
            $totalRevenue += $revenueAmount;
        }
        $canceledOrders = Transaction::where(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $currentMonth)
        ->where('tr_status', -1)
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as canceled_orders_count'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get();

    $canceledOrdersData = [];

    foreach ($canceledOrders as $order) {
        $date = $order->date;
        $canceledOrdersCount = $order->canceled_orders_count;

        $canceledOrdersData[$date] = $canceledOrdersCount;
    }
    $successfulOrders = Transaction::where(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $currentMonth)
    ->where('tr_status', 3)
    ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as successful_orders_count'))
    ->groupBy(DB::raw('DATE(created_at)'))
    ->get();

$successfulOrdersData = [];

foreach ($successfulOrders as $order) {
    $date = $order->date;
    $successfulOrdersCount = $order->successful_orders_count;

    $successfulOrdersData[$date] = $successfulOrdersCount;
}
    
    $data = [
        'bigDashboardChartdate' => 
            $dailyRevenue
        ,
        'bigDashboardCharttotal' => 
        $totalRevenue
    ,
        'lineChartExample' => $canceledOrdersData,
        'lineChartExampleWithNumbersAndGrid' =>$successfulOrdersData,
        'barChartSimpleGradientsNumbers' => [
            '123','423','543','543','157','832','123'
        ]
    ];
    
    return response()->json($data);
}

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function index()
    {
    
    
        return view('admin::index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
