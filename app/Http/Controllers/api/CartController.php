<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Cart;
class CartController extends Controller
{
    //
    public function show_cart_page(){
        // if(Session::has('cart')){
        //     $cart = Session::get('cart');
        //     $products=$cart->get_products();
        //     session(['cart'=>$cart]);
        //     return redirect('/system-builder');
        //     // return redirect('/system-builder');
        // }
        return view('pages.cart')->with('products',[]);
    }
}
