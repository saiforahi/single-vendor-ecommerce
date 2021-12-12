<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\v1\CreateOrderRequest;
use Cart;
use Auth;
use App\Models\Order;
use App\Models\PaymentType;
use Alert;

class OrderController extends Controller
{
    //
    public function place_order(){
        if(Cart::count()>0){
            // Cart::store(Auth::user()->email.'-'.date("Y-m-d H:i:s"));
            $payment_types = PaymentType::all();
            return view('pages.place_order')->with('payment_types',$payment_types);
        }
        return redirect()->back();
    }

    public function create(CreateOrderRequest $req){
        // dd($req->all());
        $tracking_code=generateRandomString(10);
        while(Order::where('tracking_code',$tracking_code)->exists()){
            $tracking_code=generateRandomString(10);
        }
        
        foreach(Cart::content() as $item){
            $additional=array(
                'tracking_code'=>$tracking_code,'product_id'=>$item->id,'product_qty'=>$item->qty,'user_id'=>Auth::user()->id
            );
            Order::create(array_merge($req->all(),$additional));
        }
        // $new_order = Order::create(array_merge(['tracking_code'=>$tracking_code],$req->all()));
        Cart::destroy();
        Alert::success('Thank you!', 'Your order has been placed'); 
        return redirect()->route('home');
        
    }

}
