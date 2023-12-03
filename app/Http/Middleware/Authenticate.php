<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */  public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        return redirect('/login')->withErrors(['message' => 'ログインしてください。']);
    }
}
