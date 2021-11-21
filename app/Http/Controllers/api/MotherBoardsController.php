<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MotherBoard;
use App\Models\Product;
use App\Http\Requests\v1\CreateMotherBoardRequest;
use App\Events\UploadImageEvent;
class MotherBoardsController extends Controller
{
    
    public function create(CreateMotherBoardRequest $req){
        try{
            $new_product = Product::create($req->only('price'));
            $new_motherboard = MotherBoard::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        array_push($images,$req->file('image'.$index));
                    }
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_motherboard){
                return response()->json(['success'=>true,'message'=>'New MotherBoard has been created'],201);
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
        
        return view('pages.motherboards.list')->with('motherboards',MotherBoard::with('product')->get())->with('brands',MotherBoard::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.motherboards.details')->with('motherboard',MotherBoard::findOrFail($id));
    }
    
}
