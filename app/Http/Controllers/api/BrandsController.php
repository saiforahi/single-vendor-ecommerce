<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\v1\CreateBrandRequest;
use App\Models\Brand;
class BrandsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum');
        $this->middleware('role:admin|user');
    }
    public function create_brand(CreateBrandRequest $req){
        $new_brand = new Brand();
        foreach ($req->all() as $key => $value) {
            $new_brand[$key]= $value;
        }
        $new_brand->save();
        if($new_brand){
            return response()->json(['success'=>true,'message'=>'A new Brand has been added!'],200);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Internal Server error'],500);
        }
    }
    public function get_all_brands(){
        $brands = Brand::all();
        return response()->json(['success'=>true,'data'=>$brands]);
    }
}
