<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memory;
use App\Models\Product;
use App\Http\Requests\v1\CreateMemoryRequest;
use App\Events\UploadImageEvent;
class MemoriesController extends Controller
{
    //
    public function create(CreateMemoryRequest $req){
        try{
            $new_product = Product::create($req->all());
            $new_storage = Memory::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            // event(new UploadImageEvent());
            $new_product->extendable_id=$new_storage->id;
            $new_product->extendable_type = $new_storage->getMorphClass();
            $new_product->save();
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        array_push($images,$req->file('image'.$index));
                    }
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_storage){
                return response()->json(['success'=>true,'message'=>'New Memory has been added'],201);
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
        return view('pages.memories.list')->with('memories',Memory::with('product')->get())->with('brands',Memory::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.memories.details')->with('memory',Memory::findOrFail($id));
    }
    public function get_all(){
        try{
            return response()->json(['success'=>true,'data'=>Memory::with('product')->withTrashed()->get()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function get_memory_create_options($parent,$child){
        try{
            $list = array();
            switch($parent){
                case 'memory':
                    foreach( Memory::all() as $memory ){
                        if(isset(json_decode($memory->memory_specs,true)[$child])){
                            array_push($list,json_decode($memory->memory_specs,true)[$child]);
                        }
                    }
                    break;
                
                case 'general':
                    foreach( Memory::all() as $memory ){
                        if(isset(json_decode($memory->general_specs,true)[$child])){
                            array_push($list,json_decode($memory->general_specs,true)[$child]);
                        }
                    }
                    break;
                
                case 'brand':
                    foreach( Memory::all() as $memory ){
                        array_push($list,$memory->brand);
                    }
                    break;

                case 'model':
                    foreach( Memory::all() as $memory ){
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
