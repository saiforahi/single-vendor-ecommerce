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
        $this->middleware('auth:sanctum')->except(['all_added_operating_systems','show_laptops']);
        $this->middleware('role:admin|user')->except(['all_added_operating_systems','show_laptops']);
    }
    public function create(CreateLaptopRequest $req){
        try{
            $new_laptop = Laptop::create($req->all());
            if($new_laptop){
                return response()->json(['success'=>true,'message'=>'New Laptop has been created'],201);
            }
            else{
                return response()->json(['success'=>false,'message'=>'Internal Server Error'],500);
            }
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>'Internal Server Error'],500);
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

    public function all_added_operating_systems(){
        try{
            $os_list = array();
            foreach( Laptop::all() as $laptop ){
                array_push($os_list,json_decode($laptop->specifications)->os);
            }
            return response()->json(['success'=>true,'data'=>array_values(array_unique($os_list))],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function show_laptops($type){
        return view('components.laptop_list')->with('type',$type);
    }
}
