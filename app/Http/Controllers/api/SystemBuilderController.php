<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\SystemBuilder;
use Session;
class SystemBuilderController extends Controller
{
    //
    public function __construct(){
        // $this->middleware('session')->except([]);
        // $this->middleware('role:admin|user')->except(['show_list','show_details','get_processor_create_options']);
    }
    public function add_processor(Request $req){
        
        $system = new SystemBuilder();
        $system->set_processor($req->processor_id);
        session('system',$system);
        return $system->get_processor();
        // dd($req->all());
    }
    public function add_processor_web($processor_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_processor($processor_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_processor($processor_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
    }
    public function remove_processor_web(){
        if(Session::has('system') && Session::get('system')->get_processor()!=''){
            $system = Session::get('system');
            $system->remove_processor();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }

    //storage
    public function add_storage_web($storage_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_storage($storage_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
            // return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_storage($storage_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
        // dd($req->all());
    }
    public function remove_storage_web(){
        if(Session::has('system') && Session::get('system')->get_storage()!=''){
            $system = Session::get('system');
            $system->remove_storage();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
    //memory
    public function add_memory_web($memory_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_memory($memory_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
            // return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_memory($memory_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
        // dd($req->all());
    }
    public function remove_memory_web(){
        if(Session::has('system') && Session::get('system')->get_memory()!=''){
            $system = Session::get('system');
            $system->remove_memory();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
    //cpu_cooler
    public function add_cooler_web($cooler_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_cooler($cooler_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
            // return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_cooler($cooler_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
        // dd($req->all());
    }
    public function remove_cooler_web(){
        if(Session::has('system') && Session::get('system')->get_cooler()!=''){
            $system = Session::get('system');
            $system->remove_cooler();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
}
