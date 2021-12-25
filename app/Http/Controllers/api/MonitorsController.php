<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitor;
use App\Models\Product;
use App\Http\Requests\v1\CreateMonitorRequest;
use App\Events\UploadImageEvent;
class MonitorsController extends Controller
{
    public function create(CreateMonitorRequest $req){
        try{
            $new_product = Product::create($req->all());
            $new_monitor = Monitor::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        array_push($images,$req->file('image'.$index));
                    }
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_monitor){
                return response()->json(['success'=>true,'message'=>'New Monitor has been created'],201);
            }
            else{
                return response()->json(['success'=>false,'message'=>'Internal Server Error'],400);
            }
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
        
        return view('pages.monitors.list')->with('monitors',Monitor::with('product')->get())->with('brands',Monitor::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.monitors.details')->with('monitor',Monitor::findOrFail($id));
    }
    public function get_all(){
        try{
            return response()->json(['success'=>true,'data'=>Monitor::with('product')->withTrashed()->get()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function get_create_options($parent,$child){
        try{
            $list = array();
            switch($parent){
                case 'brand':
                    foreach( Monitor::all() as $memory ){
                        array_push($list,$memory->brand);
                    }
                    break;

                case 'model':
                    foreach( Monitor::all() as $memory ){
                        array_push($list,$memory->model);
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
