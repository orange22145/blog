<!DOCTYPE html>

<head>
  
    <title>検索ページ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>
<form action="{{ route('search') }}" method="GET">
    <div class="form-group">

    <input type="text" style="width:60%;" name="query" placeholder="検索キーワードを入力してください">
    <button type="submit" class="btn btn-primary rounded-pill">検索</button>
</div>
</form>
<div id="main">
    @php
    //検索ページのblade
      @endphp
    @if(count($posts) > 0)
    検出数：{{ $post_count}}
    @foreach($posts as $post)
    <div id="table">
<h2><a href="article&id={{$post->id }}"> {{ $post->post_title }}</a></h2>
    <br>
     {{ $post->post_content }}
       <br><h5>投稿日時: {{$post->post_date}}</h5>
    </div>
    <br>
    <br>

    @endforeach
    <div id="navi">
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
        </div>
    @else
    <p>検索結果：記事がありません。</p>
@endif
</div>

</div>
</body>
</html>
