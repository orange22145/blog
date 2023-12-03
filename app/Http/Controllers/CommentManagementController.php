<?php
namespace App\Http\Controllers;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Models\BlogPost;


//管理画面からコメントを削除&編集&更新するコントローラー

class CommentManagementController extends Controller

//コメント管理画面の表示
{public function deleteCommentList()
       
    { 
         //1ページに表示するコメント数
      $post_limit=20;  
        $posts = BlogComment::paginate($post_limit); 
        $ids=[];
        $titles=[];
        // $ips=[];
        // $host_names=[];
        // $user_agents=[];
        //親記事と親IDの取得
        foreach ($posts as $post) {
         
          

$blog_post = BlogPost::where('id', $post->article_id)->first();
if ($blog_post) {
   
    array_push($titles, $blog_post->post_title);
    array_push($ids, $blog_post->id);

}

      
       
        }

        return view('comment-management', compact('posts','titles','ids')); // 'delete_articles.blade.php' ビューファイルを表示します
    }
    //コメント削除
    public function delete(Request $request)
    { 
        $ids = $request->input('ch_del');
          if ($ids) {
            BlogComment::whereIn('id', $ids)->delete();
    
 

        return redirect()->route('comment-management')->with('success', '記事が削除されました');

          }
    }
    //コメント編集
    public function edit($id)
{
    $post = BlogComment::find($id);
    return view('edit-comment', compact('post'));
}
//コメント更新
public function update(Request $request, $id)
{
    $post = BlogComment::find($id);

    $post->comment_content = $request->input('comment_content');
    $post->save();
    
    return view('edit-comment', compact('post'));
}

}

