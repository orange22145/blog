<?php
namespace App\Http\Controllers;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Models\BlogComment;


//管理画面から記事を削除&編集&更新するコントローラー
class ArticleManagementController extends Controller
{public function deleteArticlesList()
    {  //1ページに表示する記事数
        $post_limit=5; 
        
        //記事を取得
        $posts = BlogPost::paginate($post_limit); 
        
        //コメント数を取得
        $commentCounts=[];
        foreach ($posts as $post) {
         
          
   
   $comment_count = BlogComment::where('article_id', $post->id)->count();
   
   array_push($commentCounts, $comment_count);
     
   }
   
   
      

        return view('article-management', compact('posts','commentCounts')); // 'delete_articles.blade.php' ビューファイルを表示します
    }
    //記事を削除
    public function delete(Request $request)
    {
        $ids = $request->input('ch_del');
        if ($ids) {
      BlogPost::whereIn('id', $ids)->delete();
    
      //記事についたコメントも全て削除
 BlogComment::where('article_id', $ids)->delete();
   
    
        return redirect()->route('article-management')->with('success', '記事が削除されました');
        }
}

//記事編集
    public function edit($id)
{
    $post = BlogPost::find($id);
    return view('edit-post', compact('post'));
}

//記事更新
public function update(Request $request, $id)
{
    $post = BlogPost::find($id);

    $post->post_content = $request->input('post_content');
    $post->save();
    
    $post->post_title = $request->input('post_title');
    $post->save();
    return view('edit-post', compact('post'));

 }

}

