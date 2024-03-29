<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CpuCooler;
use App\Models\Product;
use App\Http\Requests\v1\CreateCpuCoolerRequest;
use App\Events\UploadImageEvent;
class CpuCoolerController extends Controller
{
    
    public function create(CreateCpuCoolerRequest $req){
        try{
            $new_product = Product::create($req->all());
            $new_cpucooler = CpuCooler::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        array_push($images,$req->file('image'.$index));
                    }
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_cpucooler){
                return response()->json(['success'=>true,'message'=>'New GraphicsCard has been created'],201);
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
        
        return view('pages.cpu-coolers.list')->with('cpu_coolers',CpuCooler::with('product')->get())->with('brands',CpuCooler::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.cpu-coolers.details')->with('cpu_cooler',CpuCooler::findOrFail($id));
    }
    public function get_all(){
        try{
            return response()->json(['success'=>true,'data'=>CpuCooler::with('product')->withTrashed()->get()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function delete($id){
        try{
            Mouse::findOrFail($id)->delete();
            return response()->json(['success'=>true,'message'=>'Mouse has been deleted'],200);
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
                    foreach( Mouse::all() as $mouse ){
                        array_push($list,$mouse->brand);
                    }
                    break;
                
                case 'model':
                    foreach( Mouse::all() as $mouse ){
                        array_push($list,$mouse->model);
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
