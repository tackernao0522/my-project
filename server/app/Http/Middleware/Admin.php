<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ユーザーがログインしていない場合はinformationページへリダイレクト
        if (empty(auth()->user())) {
            return redirect('/');
        }

        // ユーザーの権限チェック
        if (auth()->user()->role === 'admin') {
            $this->auth = true;
        } else {
            $this->auth = false;
        }

        // ユーザーの権限がadminだった場合は、アクセスを許可
        if ($this->auth === true) {
            return $next($request);
        }

        // それ以外はinformationページにリダイレクト
        return redirect('/')->with('status', '管理者ページへの権限がありません。');
    }
}
