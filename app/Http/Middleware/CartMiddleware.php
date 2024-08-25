<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $id_nd = Auth::user()->id;
            $cartData = $request->session()->get('cart_data' . $id_nd, []);
            
            $cart = $cartData['cart'] ?? [];
            $tongsoluong = array_sum(array_column($cart, 'soluong'));
            
            $tongtien = 0; // Khởi tạo giá trị mặc định
            
            if (isset($cartData['check_out']) && !empty($cartData['check_out'])) {
                $tongtien = array_sum(array_map(function($item) {
                    return $item['thanhtien'] ?? 0;
                }, $cartData['check_out']));
            }
    
            view()->share('tongsoluong', $tongsoluong);
            view()->share('tongtien', $tongtien);
        }
    
        return $next($request);
    }
    
    
}
