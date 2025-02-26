<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class nhanvien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('sanctum')->user();

        if ($user && $user->role === 2) {
            return $next($request);
        } else {
            $request->session()->put('prevurl', url()->current());

            return redirect()->route('nhanvien.login')
                ->with('loginErr', 'Bạn cần đăng nhập với vai trò nhanvien để truy cập trang này.');
    }
    }
}
