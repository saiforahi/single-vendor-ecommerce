<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\v1\CreatePrebuildpcRequest;
use App\Models\Prebuildpc;
use App\Models\Product;
use App\Events\UploadImageEvent;
use DB;
class PreBuildpcController extends Controller
{
    //
    public function __construct(){
        // $this->middleware('auth:sanctum')->except(['show_desktop','get_desktop_create_options']);
        // $this->middleware('role:admin|user')->except(['show_desktop','get_desktop_create_options']);
    }
    public function create(CreatePrebuildpcRequest $req){
        try{
            $new_product = Product::create($req->all());
            $new_desktop = Prebuildpc::create(array_merge($req->except('total_images','features'),['product_id'=>$new_product->id]));
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection();
                        array_push($images,$req->file('image'.$index));
                    }
                    // dd($req->file('image'.$index));
                    // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('thumb');
                    // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('main_image');
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_desktop){
                return response()->json(['success'=>true,'message'=>'New Desktop has been created'],201);
            }
            else{
                return response()->json(['success'=>false,'message'=>'Internal Server Error'],400);
            }
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function delete_desktop($id){
        try{
            Prebuildpc::findOrFail($id)->delete();
            return response()->json(['success'=>true,'message'=>'Desktop has been deleted'],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function get_all(){
        try{
            return response()->json(['success'=>true,'data'=>Prebuildpc::with('product')->withTrashed()->get()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function get_all_media($id){
        try{
            $desktop = Prebuildpc::findOrFail($id);
            $images = $desktop->getMedia();
            return response()->json(['images'=>$images]);
        }
        catch(Exception $e){
            return response()->json(['message'=>$e]);
        }
    }
    public function details($id){
        try{
            return response()->json(['success'=>true,'data'=>Prebuildpc::withTrashed()->where('id',$id)->first()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function show_desktop($type){
        return view('components.desktop_list')->with('type',$type)->with('desktop',Prebuildpc::all());
    }

    public function get_desktop_create_options($parent,$child){
        try{
            $list = array();
            switch($parent){
                case 'specifications':
                    foreach( Prebuildpc::all() as $desktop ){
                        if(isset(json_decode($desktop->specifications,true)[$child])){
                            array_push($list,json_decode($desktop->specifications,true)[$child]);
                        }
                    }
                    break;
                
                case 'brand':
                    foreach( Prebuildpc::all() as $processor ){
                        array_push($list,$processor->brand);
                    }
                    break;

                case 'model':
                    foreach( Prebuildpc::all() as $processor ){
                        array_push($list,$processor->model);
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
