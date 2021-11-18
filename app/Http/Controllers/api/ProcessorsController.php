<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processor;
class ProcessorsController extends Controller
{
    //
    public function create(CreateProductRequest $req){
        try{
            $new_processor = Processor::create($req->only('name','specifications','price'));
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection();
                        $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('thumb');
                    }
                    // dd($req->file('image'.$index));
                    // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('thumb');
                    // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('main_image');
                }
            }
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
    

    public function get_processor_create_options($type){
        try{
            $list = array();
            foreach( Processor::all() as $processor ){
                if(isset(json_decode($processor->specifications,true)[$type])){
                    array_push($list,json_decode($processor->specifications,true)[$type]);
                }
            }
            return response()->json(['success'=>true,'data'=>array_values(array_unique($list))],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
}
