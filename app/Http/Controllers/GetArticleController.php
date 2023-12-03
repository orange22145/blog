<?php

namespace App\Http\Controllers;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Models\BlogPost;
class GetArticleController extends Controller
{
    public function showPost($id)
{
    // $idを使ってブログの記事をデータベースから取得
 $post = BlogPost::find($id);

    if (!$post) {
        abort(404); // 記事が存在しない場合は404エラーを表示
    }
//記事につく1ページのコメント表示リミット
    $comments_limit=20; 
 $comments = BlogComment::where('article_id', $id)->paginate($comments_limit);
   
// テーブル名を指定して行数をカウント

$rowCount  = BlogComment::where('article_id', $id)->count();
   
 
    return view('Article', compact('post', 'comments','rowCount','comments_limit'));


         
}
  
}



