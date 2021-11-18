<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processor;
use App\Http\Requests\v1\CreateProcessorRequest;
class ProcessorsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:sanctum')->except(['show_list','show_details','get_processor_create_options']);
        $this->middleware('role:admin|user')->except(['show_list','show_details','get_processor_create_options']);
    }
    public function create(CreateProcessorRequest $req){
        try{
            $new_processor = Processor::create($req->except('total_images','images'));
            if($req->has('total_images') && $req->total_images>0){
                for($index=1;$index<=$req->total_images;$index++){
                    if($req->hasFile('image'.$index) && $req->file('image'.$index)->isValid()){
                        $new_processor->addMediaFromRequest('image'.$index)->toMediaCollection('main_image');
                        // $new_processor->addMediaFromRequest('image'.$index)->toMediaCollection('thumb');
                    }
                    // dd($req->file('image'.$index));
                    // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('thumb');
                    // $new_laptop->addMediaFromRequest('image'.$index)->toMediaCollection('main_image');
                }
            }
            if($new_processor){
                return response()->json(['success'=>true,'message'=>'New Processor has been created'],201);
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
        
        return view('pages.processors.list')->with('processors',Processor::all())->with('brands',Processor::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.processors.details')->with('processor',Processor::findOrFail($id));
    }
    public function delete($id){
        try{
            Processor::findOrFail($id)->delete();
            return response()->json(['success'=>true,'message'=>'Processor has been deleted'],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }

    public function get_all(){
        try{
            return response()->json(['success'=>true,'data'=>Processor::withTrashed()->get()],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e],500);
        }
    }
    public function get_processor_create_options($parent,$child){
        try{
            $list = array();
            switch($parent){
                case 'general':
                    foreach( Processor::all() as $processor ){
                        if(isset(json_decode($processor->general_specs,true)[$child])){
                            array_push($list,json_decode($processor->general_specs,true)[$child]);
                        }
                    }
                    break;
                
                case 'performance':
                    foreach( Processor::all() as $processor ){
                        if(isset(json_decode($processor->performance_specs,true)[$child])){
                            array_push($list,json_decode($processor->performance_specs,true)[$child]);
                        }
                    }
                    break;
                
                case 'brand':
                    foreach( Processor::all() as $processor ){
                        array_push($list,$processor->brand);
                    }
                    break;

                case 'model':
                    foreach( Processor::all() as $processor ){
                        array_push($list,$processor->model);
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
