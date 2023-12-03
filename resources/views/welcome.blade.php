<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<title>Laravel Blog</title>
</head>
<body>
        @php
      //トップページのblade
        @endphp
    <div id="main">
        @if(count($posts) > 0)
        @php
        $counter = 0;
        @endphp
        @foreach($posts as $post)
        <div id="table" >
<h2><a href="id={{$post->id }}"> {{ $post->post_title }}</a></h2>
     
 <br><h5>投稿日時: {{$post->post_date}}</h5>
 <br> 
         {{ $post->post_content }}
         <br><h5>コメント( {{$commentCounts[$counter]}})</h5>

            </div>
        <br>
        <br>
        @php
        @$counter ++;
       @endphp
        @endforeach
        <div id="navi">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
    </div>
    @else
    <p>記事がありません。</p>
@endif
</div>


        <div id="sidebar">
                <form action="{{ route('search') }}" method="GET">
                        <div class="form-group">
                        <input type="text" name="query" placeholder="検索キーワードを入力してください">
                        <button type="submit" class="btn btn-primary rounded-pill">検索</button>
                </div>
                </form>
                    <br>
<h4><div id="latest-posts-heading">投稿記事</div><br></h4>
<ul>
@foreach($sidebar_posts as $post)

<li><h5><a href="id={{$post->id }}"> {{ $post->post_title }}</a></h5> </li>
<br>
@endforeach
</ul>
<br><h5><a href="admin">管理ページ</a></h5>

        </div>
        
    
   
</body>

</html>
