<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>Laravel Blog Post Example</title>
</head>
<body>
    @php
    //管理画面突飛ページのblade
      @endphp
    <form method="post" action="/article-post">
        <div class="form-group">
        @csrf 
        <label for="post_title">タイトル:</label>
        <input type="text" id="post_title" name="post_title" style="width:50%;" class="form-control" required><br>

        <label for="post_content">記事本文</label>
        <br><textarea id="post_content" class="form-control" style="width:70%;" name="post_content" rows="8" cols="70" required></textarea><br>

      
        <button type="submit" class="btn btn-primary rounded-pill">送信</button>

    </div>
    </form>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
<br><h5><a href="article-management">記事削除</a></h5>

<br><h5><a href="comment-management">コメント削除</a></h5>
</body>
</html>
