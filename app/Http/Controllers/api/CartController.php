<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function show_cart_page(){
        return view('pages.cart')->with('cartItems',[]);
    }
}
