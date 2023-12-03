<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>ログインページ</title>
</head>
<body>
    @php
    //ログインページのblade
      @endphp
    @if(session('error'))
    <p>{{ session('error') }}</p>
@endif
Eメール：a@a.com
<br>パスワード：pass
<form method="post" action="/login">
    <div class="form-group"> 
    @csrf
    <input type="email" style="width:40%;" class="form-control" name="email" placeholder="Email" required><br>
    <input type="password" style="width:40%;" class="form-control" name="password" placeholder="Password" required><br>
       <button type="submit" class="btn btn-primary rounded-pill">Login</button>
    </div>
</form>
<br><a href="/join">登録ページ</a>
</body>
</html>
