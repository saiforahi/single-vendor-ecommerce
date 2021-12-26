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
    //case
    public function add_casing(Request $req){
        
        $system = new SystemBuilder();
        $system->set_casing($req->casing_id);
        session('system',$system);
        return $system->get_casing();
        // dd($req->all());
    }
    public function add_casing_web($casing_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_casing($casing_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_casing($casing_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
    }
    public function remove_casing_web(){
        if(Session::has('system') && Session::get('system')->get_casing()!=''){
            $system = Session::get('system');
            $system->remove_casing();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
    //graphics card
    public function add_graphic(Request $req){
        
        $system = new SystemBuilder();
        $system->set_graphic($req->graphic_id);
        session('system',$system);
        return $system->get_graphic();
        // dd($req->all());
    }
    public function add_graphic_web($graphic_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_graphic($graphic_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_graphic($graphic_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
    }
    public function remove_graphic_web(){
        if(Session::has('system') && Session::get('system')->get_graphic()!=''){
            $system = Session::get('system');
            $system->remove_graphic();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
    //power supply
    public function add_power_supplier(Request $req){
        
        $system = new SystemBuilder();
        $system->set_power_supplier($req->power_supplier_id);
        session('system',$system);
        return $system->get_power_supplier();
        // dd($req->all());
    }
    public function add_power_supplier_web($power_supplier_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_power_supplier($power_supplier_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_power_supplier($power_supplier_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
    }
    public function remove_power_supplier_web(){
        if(Session::has('system') && Session::get('system')->get_power_supplier()!=''){
            $system = Session::get('system');
            $system->remove_power_supplier();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
    //monitor
    public function add_monitor(Request $req){
        
        $system = new SystemBuilder();
        $system->set_monitor($req->monitor_id);
        session('system',$system);
        return $system->get_monitor();
        // dd($req->all());
    }
    public function add_monitor_web($monitor_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_monitor($monitor_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_monitor($monitor_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
    }
    public function remove_monitor_web(){
        if(Session::has('system') && Session::get('system')->get_monitor()!=''){
            $system = Session::get('system');
            $system->remove_monitor();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }

    //motherboard
    public function add_motherboard(Request $req){
        
        $system = new SystemBuilder();
        $system->set_motherboard($req->motherboard_id);
        session('system',$system);
        return $system->get_motherboard();
        // dd($req->all());
    }
    public function add_motherboard_web($motherboard_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_motherboard($motherboard_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_motherboard($motherboard_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
    }
    public function remove_motherboard_web(){
        if(Session::has('system') && Session::get('system')->get_motherboard()!=''){
            $system = Session::get('system');
            $system->remove_motherboard();
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
    public function remove_memory_ajax(){
        if(Session::has('system') && Session::get('system')->get_memory()!=''){
            $system = Session::get('system');
            $system->remove_memory();
            session(['system'=>$system]);
            return $system->toArray();
        }
        return "";
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
    //case cooler
    public function add_case_cooler_web($case_cooler_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_case_cooler($case_cooler_id);
            session(['system'=>$system]);
            return redirect('/system-builder');
            // return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_case_cooler($case_cooler_id);
        session(['system'=>$system]);
        return redirect('/system-builder');
        // dd($req->all());
    }
    public function remove_case_cooler_web(){
        if(Session::has('system') && Session::get('system')->get_case_cooler()!=''){
            $system = Session::get('system');
            $system->remove_case_cooler();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
    //keyboard
    public function add_keyboard_web($keyboard_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_keyboard($keyboard_id);
            session(['system'=>$system]);
            //dd(Session::get('system'));
            return redirect('/system-builder');
            // return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_keyboard($keyboard_id);
        session(['system'=>$system]);
        
        return redirect('/system-builder');
        // dd($req->all());
    }
    public function remove_keyboard_web(){
        if(Session::has('system') && Session::get('system')->get_keyboard()!=''){
            $system = Session::get('system');
            $system->remove_keyboard();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
    //mouse
    public function add_mouse_web($mouse_id){
        if(Session::has('system')){
            $system = Session::get('system');
            $system->set_mouse($mouse_id);
            session(['system'=>$system]);
            //dd(Session::get('system'));
            return redirect('/system-builder');
            // return redirect('/system-builder');
        }
        $system = new SystemBuilder();
        $system->set_mouse($mouse_id);
        session(['system'=>$system]);
        
        return redirect('/system-builder');
        // dd($req->all());
    }
    public function remove_mouse_web(){
        if(Session::has('system') && Session::get('system')->get_mouse()!=''){
            $system = Session::get('system');
            $system->remove_mouse();
            session(['system'=>$system]);
            return redirect('/system-builder');
        }
        return redirect('/system-builder');
    }
}
