<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id = array_pop($url))
        {
            $products = Product::where([
                'pro_category_id' => $id,
                'pro_active' => Product::STATUS_PUBLIC
            ])->orderBy('id','DESC')->paginate(9);
            $viewData = [
                'products' => $products
            ];
            return view('product.index', $viewData);

        }
        return redirect('/');
    }
  
public function getListProductall(){
    $products = Product::where([
        'pro_active' => Product::STATUS_PUBLIC
    ])->orderBy('id','DESC')->paginate(9);
    $viewData = [
        'products' => $products
    ];
    return view('product.index', $viewData);

}

 

public function sortProduct(Request $request)
{
    $currentUrl = $request->input('current_url');
    $path = parse_url($currentUrl, PHP_URL_PATH);
    $pattern = '/\/danh-muc\/(.*?)-(\d+)/';
    preg_match($pattern, $path, $matches);
  
    $orderby = $request->input('orderby');
    $products = null;
    if(isset($matches[2])){
        $id = $matches[2];
        switch ($orderby) {
            case 'menu_order':
                $products = Product::where([
                    'pro_category_id' => $id,
                    'pro_active' => Product::STATUS_PUBLIC
                ])->orderBy('id','DESC')->paginate(9);
                break;
            case 'popularity':
                    $products = Product::where([
                        'pro_category_id' => $id,
                        'pro_hot' =>Product::hot_on,
                        'pro_active' => Product::STATUS_PUBLIC
                    ])->orderBy('id','DESC')->paginate(9);
                break;
            case 'rating':
                $products = Product::where([
                    'pro_category_id' => $id,
                    'pro_active' => Product::STATUS_PUBLIC
                ])
                    ->select('products.*', DB::raw('(SELECT AVG(star) FROM table_comment WHERE id_product = products.id) AS avg_rating'))
                    ->orderByDesc('avg_rating')
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
              
                break;
            case 'price':
                $products = Product::where([
                    'pro_category_id' => $id,
                    'pro_active' => Product::STATUS_PUBLIC
                ])->orderBy('pro_price','ASC')->paginate(9);
                break;
            case 'price-desc':
                $products = Product::where([
                    'pro_category_id' => $id,
                    'pro_active' => Product::STATUS_PUBLIC
                ])->orderBy('pro_price','DESC')->paginate(9);
                break;
            default:
                // Xử lý khi giá trị orderby không khớp với bất kỳ giá trị nào trong danh sách
                break;
        }
    }
    else {
    switch ($orderby) {
        case 'menu_order':
            $products = Product::where('pro_active', Product::STATUS_PUBLIC)
                ->orderBy('id', 'DESC')
                ->paginate(9);
            break;
        case 'popularity':
            $products = Product::where('pro_active', Product::STATUS_PUBLIC)
                ->where('pro_hot', Product::HOT_ON)
                ->orderBy('id', 'DESC')
                ->paginate(9);
            break;
        case 'rating':
            $products = Product::where([
                'pro_active' => Product::STATUS_PUBLIC
            ])
                ->select('products.*', DB::raw('(SELECT AVG(star) FROM table_comment WHERE id_product = products.id) AS avg_rating'))
                ->orderBy('avg_rating', 'DESC')
                ->orderBy('id', 'DESC')
                ->paginate(9);

      
            break;
        case 'price':
            $products = Product::where('pro_active', Product::STATUS_PUBLIC)
                ->orderBy('pro_price', 'ASC')
                ->paginate(9);
            break;
        case 'price-desc':
            $products = Product::where('pro_active', Product::STATUS_PUBLIC)
                ->orderBy('pro_price', 'DESC')
                ->paginate(9);
            break;
        default:
            // Xử lý khi giá trị orderby không khớp với bất kỳ giá trị nào trong danh sách
            break;
    }
}

    $viewData = [
        'products' => $products
    ];
    
    $url = $currentUrl;
    session()->forget('viewData');
    session()->put('viewData', $viewData);
    
    return redirect()->to($url);
}
public function getListProductSearch(Request $request, $search)
{
    $previousURL = $request->headers->get('referer');
    $path = parse_url($previousURL, PHP_URL_PATH);
    $pattern = '/\/danh-muc\/(.*?)-(\d+)/';
    preg_match($pattern, $path, $matches);
    $products = null;
    if(isset($matches[2])){
        $id = $matches[2];
        $products = Product::where([
            'pro_category_id' => $id,
            'pro_active' => Product::STATUS_PUBLIC
        ])       ->where('pro_name', 'like', '%' . $search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(9);
    }
else {
    $products = Product::where('pro_active', Product::STATUS_PUBLIC)
        ->where('pro_name', 'like', '%' . $search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(9);
        

}
        $viewData = [
            'products' => $products
        ];

        session()->forget('viewData');
    session()->put('viewData', $viewData);
    return redirect()->to($previousURL);
}
}