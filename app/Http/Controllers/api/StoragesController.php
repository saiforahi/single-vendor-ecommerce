<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Storage;
use App\Models\Product;
use App\Http\Requests\v1\CreateStorageRequest;
class StoragesController extends Controller
{
    //
    public function create(CreateStorageRequest $req){
        try{
            $new_product = Product::create($req->only('price'));
            $new_storage = Storage::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        $new_storage->addMediaFromRequest('image'.$index)->toMediaCollection('main_image');
                        // $new_storage->addMediaFromRequest('image'.$index)->toMediaCollection('thumb');
                    }
                    // dd($req->file('image'.$index));
                    // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('thumb');
                    // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('main_image');
                }
            }
            if($new_storage){
                return response()->json(['success'=>true,'message'=>'New Storage has been added'],201);
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
        return view('pages.storages.list')->with('storages',Storage::with('product')->get())->with('brands',Storage::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.storages.details')->with('storage',Storage::findOrFail($id));
    }
}
