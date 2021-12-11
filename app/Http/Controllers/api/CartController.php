<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use \Cart as Cart;
use Auth;
use App\Models\Memory;
use Session;
use Validator;
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
    public function update_item_quantity(Request $req){
        $validator = Validator::make($req->all(), [
            'row_id' => 'required',
            'qty' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['success'=>false,'errors'=>$validator->errors()], 422);
        }
        Cart::update($req->row_id, ['qty' => $req->qty]);
        $subtotal = Cart::subTotal();
        $total = Cart::total();
        // foreach(Cart::content() as $item){
        //     array_push($items,$item);
        // }
        return response()->json(['success'=>true,'message'=>'Quantity updated','subtotal'=>$subtotal,'total'=>$total],200);
    }
    public function add_product_to_cart($product_id){
        $product = Product::findOrFail($product_id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,'weight'=>0]);
        // Cart::store('temp');
        return redirect('/cart');
    }

    public function remove_product_from_cart($rowId){
        Cart::remove($rowId);
        return redirect('/cart');
    }

    public function set_tax($tax){
        try{
            Config::set('cart.tax',(int)$tax);
            return response()->json(['success'=>true,'message'=>'Configuration Updated']);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e]);
        }
    }

    public function add_system_to_cart(){
        try{
            //memory adding
            if(Session::get('system')->get_memory()!=''){
                $product = Product::find(Session::get('system')->get_memory()->product_id);
                Cart::add([
                    'id' => $product->id, 
                    'name' => $product->name, 
                    'qty' => 1, 
                    'price' => $product->price,
                    'weight'=>0
                    ]
                );
            }
            //processor adding
            if(Session::get('system')->get_processor()!=''){
                $product = Product::find(Session::get('system')->get_processor()->product_id);
                Cart::add([
                    'id' => $product->id, 
                    'name' => $product->name, 
                    'qty' => 1, 
                    'price' => $product->price,
                    'weight'=>0
                    ]
                );
            }
            return redirect()->route('cart');
        }
        catch(Exception $e){

        }
    }
}
