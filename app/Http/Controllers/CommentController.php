<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        $previousURL = $request->headers->get('referer');
        $path = parse_url($previousURL, PHP_URL_PATH);
        $pattern = '/\/san-pham\/.*?-(\d+)/';
        preg_match($pattern, $path, $matches);
        $productId = $matches[1] ?? null;

        $comment = new Comment();
        $comment->id_account = Auth::id();
        $comment->id_product = $productId;
        $comment->star = $request->input('layngoisao');
        $comment->content = $request->input('content');
        $comment->save();
        return response()->json(['message' => 'ok']);
    }

    public function getComment(Request $request)
    {
        // dd($request->all());
    }
}