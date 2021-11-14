<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\v1\CreateLaptopRequest;
use App\Models\Laptop;
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
            $new_laptop = Laptop::create($req->only('name','specifications','price'));
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    // if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                    //     $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection();
                    // }
                    // dd($req->file('image'.$index));
                    $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('images');
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
            foreach( Laptop::all() as $laptop ){
                if(isset(json_decode($laptop->specifications,true)[$type])){
                    array_push($list,json_decode($laptop->specifications,true)[$type]);
                }
            }
            return response()->json(['success'=>true,'data'=>array_values(array_unique($list))],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
}
