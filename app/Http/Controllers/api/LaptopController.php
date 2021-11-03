<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\v1\CreateLaptopRequest;
use App\Models\Laptop;
class LaptopController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:sanctum');
        $this->middleware('role:admin|user');
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
}
