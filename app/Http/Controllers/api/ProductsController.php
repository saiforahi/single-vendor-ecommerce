<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\v1\CreateMemoryRequest;
use App\Http\Requests\v1\CreateMotherBoardRequest;
use App\Models\Product;
use App\Events\UploadImageEvent;
use App\Models\Memory;
use App\Models\MotherBoard;
class ProductsController extends Controller
{
    //
    public function add_memory(CreateMemoryRequest $req){
        try{
            $new_product = Product::create($req->all());
            $new_memory = Memory::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        
                        array_push($images,$req->file('image'.$index));
                        
                    }
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_memory){
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

    
}
