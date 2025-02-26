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
            view()->share('tongsoluong', $tongsoluong);

        }
      
        return $next($request);
    }
    
    
}
