<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExternalHardDrive;
use App\Models\Product;
use App\Http\Requests\v1\CreateExternalHardDrivesRequest;
use App\Events\UploadImageEvent;
class ExternalHardDriveController extends Controller
{
    
    public function create(CreateExternalHardDrivesRequest $req){
        try{
            $new_product = Product::create($req->all());
            $new_externalharddrive = ExternalHardDrive::create(array_merge($req->except('total_images'),['product_id'=>$new_product->id]));
            $images=array();
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        array_push($images,$req->file('image'.$index));
                    }
                }
            }
            event(new UploadImageEvent($new_product,$images));
            if($new_externalharddrive){
                return response()->json(['success'=>true,'message'=>'New KeyBoard has been created'],201);
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
        
        return view('pages.external-hard-drive.list')->with('external_hard_drives',ExternalHardDrive::with('product')->get())->with('brands',ExternalHardDrive::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.external-hard-drive.details')->with('external_hard_drive',ExternalHardDrive::findOrFail($id));
    }
    
}
