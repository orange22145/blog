<?php

namespace App\Models;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//コメントのテーブル
class BlogComment extends Model
{
    use HasFactory;
    protected $fillable = ['article_id','comment_content', 'comment_name','comment_user_agent', 'comment_ip' , 'comment_hostname' ,'comment_date'];
   protected $table = 'blog_comments';
   public function post() {
    return $this->belongsTo('App\Models\BlogPost', 'article_id', 'id');
}




}
