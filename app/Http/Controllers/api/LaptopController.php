<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\v1\CreateLaptopRequest;
use App\Models\Laptop;
use App\Models\Product;
use App\Events\UploadImageEvent;
use DB;
class LaptopController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:sanctum')->except(['show_laptops','get_laptop_create_options']);
        $this->middleware('role:admin|user')->except(['show_laptops','get_laptop_create_options']);
    }
    public function create(CreateLaptopRequest $req){
        try{
            $new_product = Product::create($req->only('price'));
            $new_laptop = Laptop::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
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
            if($new_laptop){
                return response()->json(['success'=>true,'message'=>'New Laptop has been created'],201);
            }
            else{
                return response()->json(['success'=>false,'message'=>'Internal Server Error'],400);
            }
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function delete_laptop($id){
        try{
            Laptop::findOrFail($id)->delete();
            return response()->json(['success'=>true,'message'=>'Laptop has been deleted'],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function get_all(){
        try{
            return response()->json(['success'=>true,'data'=>Laptop::withTrashed()->get()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function get_all_media($id){
        try{
            $laptop = Laptop::findOrFail($id);
            $images = $laptop->getMedia();
            return response()->json(['images'=>$images]);
        }
        catch(Exception $e){
            return response()->json(['message'=>$e]);
        }
    }
    public function details($id){
        try{
            return response()->json(['success'=>true,'data'=>Laptop::withTrashed()->where('id',$id)->first()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function show_laptops($type){
        return view('components.laptop_list')->with('type',$type)->with('laptops',Laptop::all());
    }

    public function get_laptop_create_options($type){
        try{
            $list = array();
            if($type == 'brand'){
                $list = Laptop::select('brand')->distinct()->get('brand')->toArray();
            }
            else if($type=='model'){
                $list = Laptop::select('model')->distinct()->get('model')->toArray();
            }else{
                foreach( Laptop::all() as $laptop ){
                    if(isset(json_decode($laptop->specifications,true)[$type])){
                        array_push($list,json_decode($laptop->specifications,true)[$type]);
                    }
                }
            }
            return response()->json(['success'=>true,'data'=>array_values(array_unique($list))],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
}
