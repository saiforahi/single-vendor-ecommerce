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
            $new_order=Order::create(array_merge($req->all(),$additional));
            $new_order->payment_status='unpaid';
            $new_order->save();
        }
        // $new_order = Order::create(array_merge(['tracking_code'=>$tracking_code],$req->all()));
        Cart::destroy();
        Alert::success('Thank you!', 'Your order has been placed'); 
        return redirect()->route('home');
        
    }

    public function all_orders(){
        try{
            $orders=Order::with('product')->with('customer')->with('payment_type')->get()->groupBy('tracking_code')->toArray();
            // $orders=$orders->groupBy('tracking_code')->toArray();
            return response()->json(['status'=>true,'data'=>$orders]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function find_sales($from,$to){
        try{
            $orders=Order::with('product')->with('customer')->with('payment_type')->where('payment_status','=','paid')->whereBetween('updated_at', [$from, $to])->get();
            // $orders=Order::with('product')->with('customer')->with('payment_type')->get()->groupBy('tracking_code')->toArray();
            $total_sale=0;
            foreach($orders as $order){
                $total_sale += $order->product->price * $order->product_qty;
            }
            $orders=$orders->groupBy('tracking_code')->toArray();
            return response()->json(['status'=>true,'data'=>$orders,'total_sale'=>$total_sale]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function make_paid($order_id){
        try{
            Order::find($order_id)->update(['payment_status'=>'paid']);
            return response()->json(['status'=>true,'message'=>"Payment Status has been updated"]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
}
