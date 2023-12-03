
<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->post_title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    @php
  //記事ページのblade
    @endphp
    <div id="table" >
        @php
   
   $comment_counter = ($comments->currentPage() - 1) * $comments_limit + 1;

  
         
    @endphp
        
   
          
<h2><a href="id={{$post->id }}"> {{ $post->post_title }}</a></h2>
    <br><h5>投稿日時: {{$post->post_date}}</h5>
    
    <br> {{ $post->post_content }}
         <br><h5>コメント({{$rowCount}})</h5>
    
   
</div>
    @foreach($comments as $comment)
    <br>
<div id="comment">
    @php
   
   

     @endphp
    {{$comment_counter}}.名前：  {{ $comment->comment_name}}
  <br><h5>投稿日時: {{$comment->comment_date}}</h5>

  <br>{{ $comment->comment_content }}
  
</div>

<br>
@php
$comment_counter ++;
@endphp
@endforeach
<div id="navi">
    {{ $comments->links('vendor.pagination.bootstrap-4') }}
    </div>

    <form method="post" action="/comment-post">
        <div class="form-group">
        @csrf 
     
        <input type="hidden" id="article_id" name="article_id" value="{{$post->id }}">
               <label for="comment_name">名前:</label><input type="text"  style="width:50%;" class="form-control" id="comment_name" name="comment_name" required><br>

        <label for="comment_content">本文</label><br>
        <textarea id="comment_content" name="comment_content"  style="width:70%;" class="form-control" rows="8" cols="70" required></textarea><br>

      
    
        <button type="submit" class="btn btn-primary rounded-pill">送信</button>
        </div>
    </form>




</body>
</html>





