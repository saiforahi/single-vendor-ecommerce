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
        $system = new SystemBuilder();
        $system->set_processor($processor_id);
        session(['system'=>$system]);
        return view('pages.system-builder');
        // dd($req->all());
    }
    public function remove_processor_web(){
        if(Session::has('system') && Session::get('system')->get_processor()!=''){
            $system = Session::get('system');
            $system->remove_processor();
            session(['system'=>$system]);
            return view('pages.system-builder');
        }
        return view('index');
    }
}
