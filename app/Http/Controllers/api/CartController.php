<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use \Cart as Cart;
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
        return view('pages.cart');
    }

    public function add_product_to_cart($product_id){
        $product = Product::findOrFail($product_id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,'weight'=>0]);
        return view('pages.cart');
    }

    public function remove_product_from_cart($rowId){
        Cart::remove($rowId);
        return view('pages.cart');
    }
}
