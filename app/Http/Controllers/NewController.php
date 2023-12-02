<?php

namespace App\Http\Controllers;
use App\Models\Article;

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
}
