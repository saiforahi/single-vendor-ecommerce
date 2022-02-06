<?php

namespace App\Classes;
use App\Models\Processor;
use App\Models\Storage;
use App\Models\Memory;
use App\Models\Monitor;
use App\Models\CpuCooler;
use App\Models\MotherBoard;
use App\Models\Casing;
use App\Models\Graphic;
use App\Models\PowerSupply;
use App\Models\CaseCooler;
use App\Models\Keyboard;
use App\Models\Mouse;
use App\Models\SoundCard;

class SystemBuilder
{
    private $total_price=0;
    private $processor = '';
    private $motherboard = '';
    private $storage = '';
    private $secondary_storage = '';
    private $memory = '';
    private $cooler = '';
    private $casing = '';
    private $graphic = '';
    private $monitor = '';
    private $power_supplier = '';
    private $case_cooler = '';
    private $keyboard = '';
    private $mouse = '';
    private $soundcard = '';
    //reset system builder
    public function reset(){
        $this->total_price=0;
        $this->processor = '';
        $this->motherboard = '';
        $this->storage = '';
        $this->secondary_storage='';
        $this->memory = '';
        $this->cooler = '';
        $this->casing = '';
        $this->graphic = '';
        $this->monitor = '';
        $this->power_supplier = '';
        $this->case_cooler = '';
        $this->keyboard = '';
        $this->mouse = '';
        $this->soundcard = '';
    }
    //processor
    public function get_total_price(){
        return $this->total_price;
    }
    public function set_processor($processor_id){
        $this->total_price+=Processor::find($processor_id)->product->price;
        $this->processor = $processor_id;
    }

    public function get_processor(){
        if($this->processor!=''){
            return Processor::findOrFail($this->processor);
        }
        return $this->processor;
    }

    public function remove_processor(){
        $this->total_price-=Processor::find($this->processor)->product->price;
        $this->processor="";
    }
    //keyboard
    public function set_keyboard($keyboard_id){
        $this->total_price+=Keyboard::find($keyboard_id)->product->price;
        $this->keyboard = $keyboard_id;
    }

    public function get_keyboard(){
        if($this->keyboard!=''){
            return Keyboard::findOrFail($this->keyboard);
        }
        return $this->keyboard;
    }

    public function remove_keyboard(){
        $this->total_price-=Keyboard::find($this->keyboard)->product->price;
        $this->keyboard="";
    }
    //mouse
    public function set_mouse($mouse_id){
        $this->total_price+=Mouse::find($mouse_id)->product->price;
        $this->mouse = $mouse_id;
    }

    public function get_mouse(){
        if($this->mouse!=''){
            return Mouse::findOrFail($this->mouse);
        }
        return $this->mouse;
    }

    public function remove_mouse(){
        $this->total_price-=Mouse::find($this->mouse)->product->price;
        $this->mouse="";
    }
    //sound card
    public function set_soundcard($soundcard_id){
        $this->total_price+=SoundCard::find($soundcard_id)->product->price;
        $this->soundcard = $soundcard_id;
    }

    public function get_soundcard(){
        if($this->soundcard!=''){
            return SoundCard::findOrFail($this->soundcard);
        }
        return $this->soundcard;
    }

    public function remove_soundcard(){
        $this->total_price-=SoundCard::find($this->soundcard)->product->price;
        $this->soundcard="";
    }
    //monitor
    public function set_monitor($monitor_id){
        $this->total_price+=Monitor::find($monitor_id)->product->price;
        $this->monitor = $monitor_id;
    }

    public function get_monitor(){
        if($this->monitor!=''){
            return Monitor::findOrFail($this->monitor);
        }
        return $this->monitor;
    }

    public function remove_monitor(){
        $this->total_price-=Monitor::find($this->monitor)->product->price;
        $this->monitor="";
    }
    //power supply
    public function set_power_supplier($power_supplier_id){
        $this->total_price+=PowerSupply::find($power_supplier_id)->product->price;
        $this->power_supplier = $power_supplier_id;
    }

    public function get_power_supplier(){
        if($this->power_supplier!=''){
            return PowerSupply::findOrFail($this->power_supplier);
        }
        return $this->power_supplier;
    }

    public function remove_power_supplier(){
        $this->total_price-=PowerSupply::find($this->power_supplier)->product->price;
        $this->power_supplier="";
    }
    //graphic
    public function set_graphic($graphic_id){
        $this->total_price+=Graphic::find($graphic_id)->product->price;
        $this->graphic = $graphic_id;
    }

    public function get_graphic(){
        if($this->graphic!=''){
            return Graphic::findOrFail($this->graphic);
        }
        return $this->graphic;
    }

    public function remove_graphic(){
        $this->total_price-=Graphic::find($this->graphic)->product->price;
        $this->graphic="";
    }
    //case

    public function set_casing($casing_id){
        $this->total_price+=Casing::find($casing_id)->product->price;
        $this->casing = $casing_id;
    }

    public function get_casing(){
        if($this->casing!=''){
            return Casing::findOrFail($this->casing);
        }
        return $this->casing;
    }

    public function remove_casing(){
        $this->total_price-=Casing::find($this->casing)->product->price;
        $this->casing="";
    }
    //motherboard
    public function set_motherboard($motherboard_id){
        $this->total_price+=MotherBoard::find($motherboard_id)->product->price;
        $this->motherboard = $motherboard_id;
    }

    public function get_motherboard(){
        if($this->motherboard!=''){
            return MotherBoard::findOrFail($this->motherboard);
        }
        return $this->motherboard;
    }

    public function remove_motherboard(){
        $this->total_price-=MotherBoard::find($this->motherboard)->product->price;
        $this->motherboard="";
    }
    //storage
    public function set_storage($storage_id){
        $this->total_price+=Storage::find($storage_id)->product->price;
        $this->storage = $storage_id;
    }
    

    public function get_storage(){
        if($this->storage!=''){
            return Storage::with('product')->findOrFail($this->storage);
        }
        return $this->storage;
    }

    public function remove_storage(){
        $this->total_price-=Storage::find($this->storage)->product->price;
        $this->storage="";
    }
    //secondary storage
    public function set_secondary_storage($storage_id){
        $this->total_price+=Storage::find($storage_id)->product->price;
        $this->secondary_storage = $storage_id;
    }
    

    public function get_secondary_storage(){
        if($this->secondary_storage!=''){
            return Storage::with('product')->findOrFail($this->secondary_storage);
        }
        return $this->secondary_storage;
    }

    public function remove_secondary_storage(){
        $this->total_price-=Storage::find($this->secondary_storage)->product->price;
        $this->secondary_storage="";
    }
    //memory
    public function set_memory($memory_id){
        $this->total_price+=Memory::find($memory_id)->product->price;
        $this->memory = $memory_id;
    }

    public function get_memory(){
        if($this->memory!=''){
            return Memory::with('product')->findOrFail($this->memory);
        }
        return $this->memory;
    }

    public function remove_memory(){
        $this->total_price-=Memory::find($this->memory)->product->price;
        $this->memory="";
    }
    //cooler
    public function set_cooler($cooler_id){
        $this->total_price+=CpuCooler::find($cooler_id)->product->price;
        $this->cooler = $cooler_id;
    }

    public function get_cooler(){
        if($this->cooler!=''){
            return CpuCooler::findOrFail($this->cooler);
        }
        return $this->cooler;
    }

    public function remove_cooler(){
        $this->total_price-=CpuCooler::find($this->cooler)->product->price;
        $this->cooler="";
    }
    //case cooler
    public function set_case_cooler($case_cooler_id){
        $this->total_price+=CaseCooler::find($case_cooler_id)->product->price;
        $this->case_cooler = $case_cooler_id;
    }

    public function get_case_cooler(){
        if($this->case_cooler!=''){
            return CaseCooler::findOrFail($this->case_cooler);
        }
        return $this->case_cooler;
    }

    public function remove_case_cooler(){
        $this->total_price-=CaseCooler::find($this->case_cooler)->product->price;
        $this->case_cooler="";
    }
}
