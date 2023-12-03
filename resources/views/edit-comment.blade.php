
<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->post_title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    @php
    //コメント編集管理画面のblade
      @endphp
<form action="{{ route('comment.update', $post->id) }}" method="POST">
    <div class="form-group">
    @csrf
    @method('PUT')
   
    <br>{{$post->id }}
    <br><label for="comment_name">名前:</label>{{ $post->comment_name }}

    <br>  <textarea name="comment_content"  style="width:70%;" class="form-control" rows="8" cols="70" >{{ $post->comment_content }}</textarea>
   <br> <button type="submit" class="btn btn-primary rounded-pill">更新</button>

</div>
</form>


</body>
</html>





