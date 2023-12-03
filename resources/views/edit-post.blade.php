
<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->post_title }}の編集</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    @php
    //記事編集管理画面のblade
      @endphp
<form action="{{ route('articles.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="post_title">タイトル:</label>
    <input type="text" id="post_title" name="post_title" style="width:50%;" required value={{ $post->post_title }}><br>
    <br>本文
    <br><textarea rows="8" cols="70" style="width:70%;" name="post_content">{{ $post->post_content }}</textarea>
    <br>
   <button type="submit" class="btn btn-primary rounded-pill">更新</button>

</form>


</body>
</html>





