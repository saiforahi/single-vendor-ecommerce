<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memory;
class MemoriesController extends Controller
{
    //
    public function show_list(){
        return view('pages.memories.list')->with('memories',Memory::with('product')->get())->with('brands',Memory::select('brand')->distinct()->get());
    }
    public function show_details($id){
        return view('pages.memories.details')->with('memory',Memory::findOrFail($id));
    }
}
