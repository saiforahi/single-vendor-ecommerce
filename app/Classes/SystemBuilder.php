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
class SystemBuilder
{
    private $processor = '';
    private $motherboard = '';
    private $storage = '';
    private $memory = '';
    private $cooler = '';
    private $casing = '';
    private $graphic = '';
    private $monitor = '';
    private $power_supply = '';
    public function set_processor($processor_id){
        $this->processor = $processor_id;
    }

    public function get_processor(){
        if($this->processor!=''){
            return Processor::findOrFail($this->processor);
        }
        return $this->processor;
    }

    public function remove_processor(){
        $this->processor="";
    }
    public function set_monitor($monitor_id){
        $this->monitor = $monitor_id;
    }

    public function get_monitor(){
        if($this->monitor!=''){
            return Monitor::findOrFail($this->monitor);
        }
        return $this->monitor;
    }

    public function remove_monitor(){
        $this->monitor="";
    }
    public function set_power_supply($power_supply_id){
        $this->processor = $processor_id;
    }

    public function get_power_supply(){
        if($this->power_supply!=''){
            return PowerSupply::findOrFail($this->power_supply);
        }
        return $this->power_supply;
    }

    public function remove_power_supply(){
        $this->power_supply="";
    }
    public function set_graphic($graphic_id){
        $this->graphic = $graphic_id;
    }

    public function get_graphic(){
        if($this->graphic!=''){
            return Graphic::findOrFail($this->graphic);
        }
        return $this->graphic;
    }

    public function remove_graphic(){
        $this->graphic="";
    }

    public function set_casing($casing){
        $this->casing = $casing_id;
    }

    public function get_casing(){
        if($this->casing!=''){
            return Casing::findOrFail($this->casing);
        }
        return $this->casing;
    }

    public function remove_casing(){
        $this->casing="";
    }
    public function set_motherboard($motherboard_id){
        $this->motherboard = $motherboard_id;
    }

    public function get_motherboard(){
        if($this->motherboard!=''){
            return MotherBoard::findOrFail($this->motherboard);
        }
        return $this->motherboard;
    }

    public function remove_motherboard(){
        $this->motherboard="";
    }
    public function set_storage($storage_id){
        $this->storage = $storage_id;
    }
    

    public function get_storage(){
        if($this->storage!=''){
            return Storage::findOrFail($this->storage);
        }
        return $this->storage;
    }

    public function remove_storage(){
        $this->storage="";
    }
    //memory
    public function set_memory($memory_id){
        $this->memory = $memory_id;
    }

    public function get_memory(){
        if($this->memory!=''){
            return Memory::with('product')->findOrFail($this->memory);
        }
        return $this->memory;
    }

    public function remove_memory(){
        $this->memory="";
    }
    //cooler
    public function set_cooler($cooler_id){
        $this->cooler = $cooler_id;
    }

    public function get_cooler(){
        if($this->cooler!=''){
            return CpuCooler::findOrFail($this->cooler);
        }
        return $this->cooler;
    }

    public function remove_cooler(){
        $this->cooler="";
    }
}
