<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PowerSupply;
use App\Models\Product;
use App\Http\Requests\v1\CreatePowerSupplyRequest;
use App\Events\UploadImageEvent;
class PowerSupplyController extends Controller
{
    
    public function create(CreatePowerSupplyRequest $req){
        try{
            $new_product = Product::create($req->all());
            $new_powersupply = PowerSupply::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        array_push($images,$req->file('image'.$index));
                    }
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_powersupply){
                return response()->json(['success'=>true,'message'=>'New PowerSupply has been created'],201);
            }
            else{
                return response()->json(['success'=>false,'message'=>'Internal Server Error'],400);
            }
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function delete($id){
        try{
            PowerSupply::findOrFail($id)->delete();
            return response()->json(['success'=>true,'message'=>'Power Supply has been deleted'],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function show_list(){
        // $brands = DB::table('processors')
        // ->select('id','name', 'brand')
        // ->groupBy('brand')
        // ->get();
        
        return view('pages.power-supply.list')->with('power_supplies',PowerSupply::with('product')->get())->with('brands',PowerSupply::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.power-supply.details')->with('power_supplier',PowerSupply::findOrFail($id));
    }
    public function get_all(){
        try{
            return response()->json(['success'=>true,'data'=>PowerSupply::with('product')->withTrashed()->get()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function get_power_supply_create_options($parent,$child){
        try{
            $list = array();
            switch($parent){
                case 'specifications':
                    foreach( PowerSupply::all() as $powersupply ){
                        if(isset(json_decode($powersupply->specifications,true)[$child])){
                            array_push($list,json_decode($powersupply->specifications,true)[$child]);
                        }
                    }
                    break;

                case 'brand':
                    foreach( PowerSupply::all() as $powersupply ){
                        array_push($list,$powersupply->brand);
                    }
                    break;
                
                case 'model':
                    foreach( PowerSupply::all() as $powersupply ){
                        array_push($list,$powersupply->model);
                    }
                    break;
                    
            }
            return response()->json(['success'=>true,'data'=>array_values(array_unique($list))],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
}
