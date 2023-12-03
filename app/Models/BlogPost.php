<?php

namespace App\Models;
use App\Models\BlogComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//記事のテーブル
class BlogPost extends Model
{
    use HasFactory;
protected $fillable = ['post_content', 'post_title', 'post_date'];
   protected $table = 'blog_posts';
   public function comments() {
    return $this->hasMany('App\Models\BlogComment', 'article_id', 'id');
}
}
