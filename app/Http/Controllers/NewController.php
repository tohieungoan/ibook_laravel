<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class NewController extends FrontendController
{

   public function returnview () {
      $news = Article::where([
         'a_active'=>Article::STATUS_PUBLIC
        ])->orderBy('id', 'desc')->get();
        $viewData = [
         'news' => $news
     ];
    return view('news.new', $viewData);
   }

 
   public function detailnew(Request $request){
      $url = $request->segment(2);
      $url = preg_split('/(-)/i',$url);
      if($id = array_pop($url)){
          $newDetail = Article::where('a_active',Article::STATUS_PUBLIC)->FIND($id); 
          $viewData = [
              'newDetail' => $newDetail
          ];
          return view('news.newdetails', $viewData);
      }
  }
}
