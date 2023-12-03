<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
//ログイン認証のコントローラー
class AuthController extends Controller
{
    //ログインフォームの表示
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/admin');
        } else {
            return redirect('/login')->with('error', 'Invalid credentials');
        }
    }
//管理画面トップの表示
    public function adminPage()
    {
        return view('admin');
    }
//ユーザー登録画面の表示
    public function showRegistrationForm()
    {
        return view('join');
    }

    public function register(Request $request)
    {
       // パスワードをハッシュ化する
       $hashedPassword = Hash::make($request->password);

       // ユーザーモデルを作成してデータベースに保存する
       $user = User::create([
        'name' =>'管理人',
           'email' => $request->email,
           'password' => $hashedPassword,
       ]);

       // 登録後にログインする場合
       Auth::login($user);

       return redirect('/admin');;
    }
}
