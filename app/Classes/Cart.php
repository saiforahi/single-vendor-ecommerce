<?php

namespace App\Classes;
use App\Models\Processor;
use App\Models\Storage;
use App\Models\Memory;
use App\Models\CpuCooler;
use App\Models\Products;
class Cart
{
    private $products = array();
    // public function set_products($processor_id){
    //     $this->products = $processor_id;
    // }

    public function get_products(){
        // if(count($this->products)){
        //     return Processor::findOrFail($this->products);
        // }
        return $this->products;
    }
    public function add_item(Product $product){
        $this->products=array_push($this->products,$product);
    }
}
