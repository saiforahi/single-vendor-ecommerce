<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessorsController extends Controller
{
    //
    public function add_processor(){

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
           'fname' => 'required',
           'title' => 'required',
           'category' => 'required',
           'body1' => 'required',
           'body2' => 'nullable',
           'banner' => 'mimes:jpg,png,svg,jpeg,PNG,bmp',
           'body_img' => 'mimes:jpg,png,svg,jpeg,PNG,bmp',
           'avatar' => 'mimes:jpg,png,svg,jpeg,PNG,bmp',
        ]);
        if(!$request->hasFile('banner')){
            return redirect()->back()->with('error','Banner image is required!');
        }
        try{
            $blog = Blog::create($request->only(['title','category','body1','body2']));
            $blog->update([
               'code' => Str::uuid(),
               'author' => $user->id
            ]);
            if($request->hasFile('body_img')){
                $blog->addMedia($request->file('body_img'))
                    ->toMediaCollection('body_image');
            }
            $blog->addMedia($request->file('banner'))
                ->toMediaCollection('banner');

            return redirect()->back()->with([
               'success' => 'You new blog has been posted.'
            ]);

        }catch (\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
