<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


namespace App\Http\Controllers;
use App\Models\BlogPost;
use Illuminate\Http\Request;

//記事をキーワード検索するコントローラー
class SearchController extends Controller
{
    public function search(Request $request)
    {   //1ページの検出リミット数
         $saerch_limit=10; 
        $query = $request->input('query');
        $posts = BlogPost::where('post_title', 'like', '%'.$query.'%')->orWhere('post_content', 'like', '%'.$query.'%')->paginate($saerch_limit);
        //検出数を取得
        $post_count = BlogPost::where('post_title', 'like', '%'.$query.'%')->orWhere('post_content', 'like', '%'.$query.'%')->count();
       
       
      
     
        return view('search', compact('posts', 'query','post_count'));
    }
}
