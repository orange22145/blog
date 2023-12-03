<!DOCTYPE html>

<head>

    <title>コメント編集</title>
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






</head>
<body>
  @php
  //コメント一覧管理画面のblade
    @endphp
    <div id="main">
      @if(count($posts) > 0)
      
      <form action="{{ route('comment.delete') }}" method="post">
        @csrf
        @php
        $counter = 0;
        @endphp
   
          @foreach($posts as $post)
      
        <div id="table">
         <input type="checkbox"  name="ch_del[]" value="{{ $post->id }}"><a href="id={{$post->id }}"> {{ $post->id }}</a><br>名前： {{ $post->comment_name }}
         <br>{{$post->comment_user_agent}}
         <br>{{$post->comment_ip}}
         <br>{{$post->comment_hostname}}

         <br>
       
        
        @if(count($ids)>$counter)
        親記事:<a href="../id={{$ids[$counter]}}"> {{ $titles[$counter] }}</a>
        @endif
         <br>
         {{ $post->comment_content }}
           <br><h5>投稿日時: {{$post->comment_date}}</h5>
                   <h5><a href="{{ route('comment.edit', $post->id) }}">編集</a></h5>  
          </div>
        <br>
        <br>
       
        @php
 @$counter ++;
@endphp
          @endforeach
              
          <button type="submit" >削除</button>
    
    </form>
    <INPUT TYPE="button" onClick="box_check(true);" VALUE="全て選択"> <INPUT TYPE="button" onClick="box_check(false);" VALUE="全て未選択">
         
   
   
        <div id="navi">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
    </div>
    @else
    <p>コメントがありません。</p>

@endif
</div>
</body>
</html>
