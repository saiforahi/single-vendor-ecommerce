<?php

namespace App\Classes;
use App\Models\Processor;
use App\Models\Storage;
use App\Models\Memory;
class SystemBuilder
{
    private $processor = '';
    private $storage = '';
    private $memory = '';
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
            return Memory::findOrFail($this->memory);
        }
        return $this->memory;
    }

    public function remove_memory(){
        $this->memory="";
    }
}
