<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>
    @php
    //ユーザー登録ページのblade
      @endphp
    <h2>Register</h2>
    <form method="post" action="join">
        <div class="form-group">
        @csrf
        <input type="email" style="width:40%;" class="form-control" name="email" placeholder="Email" required><br>
        <input type="password" style="width:40%;" class="form-control" name="password" placeholder="Password" required><br>
          <button type="submit" class="btn btn-primary rounded-pill">登録</button>
        </div>
    </form>
</body>
</html>
