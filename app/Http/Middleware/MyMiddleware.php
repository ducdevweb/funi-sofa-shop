<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('admin')->user();

        if ($user && $user->role == 0) {
            return $next($request);
        } else {
            $request->session()->put('prevurl', url()->current());

            return redirect()->route('admin.login')
                ->with('thongbao', 'Bạn cần đăng nhập với vai trò admin để truy cập trang này.');
    }

    }








}
