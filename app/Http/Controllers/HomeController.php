<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Article;
class HomeController extends FrontendController
{

    public function __construct(){
        parent::__construct();
    }
    public function index(){
       $productHot =  Product::where([
        'pro_hot'=> Product::hot_on,
        'pro_active'=> Product::STATUS_PUBLIC
       ])->limit(16)->get();

       $productRandom =  Product::where([
        'pro_active'=> Product::STATUS_PUBLIC
       ])->inRandomOrder()->limit(16)->get();

       $newProduct = Product::where([
        'pro_active'=> Product::STATUS_PUBLIC
       ])->orderBy('id', 'desc')->limit(16)->get();

       $news = Article::where([
        'a_active'=>Article::STATUS_PUBLIC
       ])->orderBy('id', 'desc')->limit(3)->get();
       $viewData = [
        'productHot' => $productHot ,
        'productRandom' => $productRandom ,
        'newProduct' => $newProduct ,
        'news' => $news ,
       ];
        return view('home.index', $viewData); 
    }
}
