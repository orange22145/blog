<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
<SCRIPT TYPE="text/javascript">
function box_check(check_bool) {
      var checkboxes = document.getElementsByName("ch_del[]");
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = check_bool;
      }
}
  </SCRIPT>
    <title>記事管理</title>
</head>
<body>
  @php
  //記事一覧管理画面のblade
    @endphp
    <div id="main">
      @php
      $counter = 0;
      @endphp
      @if(count($posts) > 0)
      <form action="{{ route('article.delete') }}" method="post">
        @csrf
    
          @foreach($posts as $post)
          
        <div id="table">
          <h2><input type="checkbox" name="ch_del[]" value="{{ $post->id }}"><a href="id={{$post->id }}"> {{ $post->post_title }}</a></h2>
       <br><h5>投稿日時: {{$post->post_date}}</h5>
        
        <br> {{ $post->post_content }}
        <br><h5>コメント( {{$commentCounts[$counter]}})</h5>

        <br>   <a href="{{ route('articles.edit', $post->id) }}">編集</a>  
          </div>
        <br>
        <br>
        @php
        @$counter ++;
       @endphp
          @endforeach
                
          <button type="submit">削除</button>
       
          <INPUT TYPE="button" onClick="box_check(true);" VALUE="全て選択"> <INPUT TYPE="button" onClick="box_check(false);" VALUE="全て未選択">
         
      
    </form>
 
        <div id="navi">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
    </div>
    @else
    <p>記事がありません。</p>
@endif
</div>
</body>
</html>
