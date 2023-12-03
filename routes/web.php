<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\AuthController;

use App\Http\Controllers\BlogPostController;


use App\Http\Controllers\GetArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleManagementController;
use App\Http\Controllers\CommentManagementController;
use App\Http\Controllers\SearchController;


use Illuminate\Support\Facades\Route;


//トップページ
Route::get('/', [BlogPostController::class, 'index']);

//記事投稿
Route::post('/article-post', [BlogPostController::class, 'postBlogArticle']);
//コメント投稿
Route::post('/comment-post', [CommentController::class, 'postComment']);
//コメント管理ページ
Route::get('/comment-management', [CommentManagementController::class, 'deleteCommentList'])->name('comment-management')->middleware('auth');;
//記事管理ページ
Route::get('/article-management', [ArticleManagementController::class, 'deleteArticlesList'])->name('article-management')->middleware('auth');;
//記事削除
Route::post('/deleteBlogPost', [ArticleManagementController::class, 'delete'])->name('article.delete')->middleware('auth');;
//コメント削除
Route::post('/deleteCommentPost', [CommentManagementController::class, 'delete'])->name('comment.delete')->middleware('auth');;

//記事単体取得
Route::get('/id={id}', [GetArticleController::class, 'showPost']);

//ログインページ
Route::get('/login', [AuthController::class, 'showLoginForm']);
//ログインポスト
Route::post('/login', [AuthController::class, 'login']);
//管理ページトップ
Route::get('/admin/', [AuthController::class, 'adminPage'])->middleware('auth');
//登録ページ
Route::get('/join', [AuthController::class, 'showRegistrationForm']);
//ユーザー登録をポスト
Route::post('/join', [AuthController::class, 'register']);


// 記事編集ページを表示
Route::get('/articles/{id}/edit', [ArticleManagementController::class, 'edit'])->name('articles.edit')->middleware('auth');

// 記事を更新
Route::put('/articles/{id}/update', [ArticleManagementController::class, 'update'])->name('articles.update')->middleware('auth');

// コメント編集ページを表示
Route::get('/comment/{id}/edit', [CommentManagementController::class, 'edit'])->name('comment.edit')->middleware('auth');

// コメントを更新
Route::put('/comment/{id}/update', [CommentManagementController::class, 'update'])->name('comment.update')->middleware('auth');
//検索ページ
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('aa', [AuthController::class, 'register']);
Route::get('zzz', [AuthController::class, 'register']);

