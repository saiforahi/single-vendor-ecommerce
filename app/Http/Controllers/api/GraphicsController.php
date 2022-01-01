<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Graphic;
use App\Models\Product;
use App\Http\Requests\v1\CreateGraphicsCardRequest;
use App\Events\UploadImageEvent;
class GraphicsController extends Controller
{
    
    public function create(CreateGraphicsCardRequest $req){
        try{
            $new_product = Product::create($req->all());
            $new_graphics = Graphic::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        array_push($images,$req->file('image'.$index));
                    }
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_graphics){
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
    public function delete($id){
        try{
            Graphic::findOrFail($id)->delete();
            return response()->json(['success'=>true,'message'=>'Graphic has been deleted'],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function get_all(){
        try{
            return response()->json(['success'=>true,'data'=>Graphic::with('product')->withTrashed()->get()],200);
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
        
        return view('pages.graphics-cards.list')->with('graphics',Graphic::with('product')->get())->with('brands',Graphic::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.graphics-cards.details')->with('graphic',Graphic::findOrFail($id));
    }
    public function get_create_options($parent,$child){
        try{
            $list = array();
            switch($parent){
                case 'brand':
                    foreach( Graphic::all() as $graphic ){
                        array_push($list,$graphic->brand);
                    }
                    break;
                
                case 'model':
                    foreach( Graphic::all() as $graphic ){
                        array_push($list,$graphic->model);
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
