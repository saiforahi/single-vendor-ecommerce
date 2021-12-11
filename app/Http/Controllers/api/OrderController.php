<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Models\Order;
class OrderController extends Controller
{
    //
    public function place_order(){
        if(Cart::count()>0){
            Cart::store(Auth::user()->email.'-'.date("Y-m-d H:i:s"));
            return view('pages.place_order');
        }
        return redirect()->back();
    }

    public function store(Request $req){
        $new_order = Order::create($req->all());
    }
}
