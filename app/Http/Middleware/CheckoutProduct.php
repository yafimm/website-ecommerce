<?php

namespace App\Http\Middleware;

use Closure;
use Cart;

class CheckoutProduct
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
        if(Cart::getTotalQuantity() > 0){
            return $next($request);
        }
        return redirect()->route('produk.index_produk')->with('alert-class', 'alert-info')
                                    ->with('flash_message', "You don't have a product to checkout, choose a product to checkout");
    }
}
