<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resort;
use Image;

class ResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return Resort::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'resort_name' => 'required|unique:resorts|max:255',
            'resort_location' => 'required',
   
           ]);
           if ($request->resort_image) {
            $position = strpos($request->resort_image, ';');
            $sub = substr($request->resort_image, 0, $position);
            $ext = explode('/', $sub)[1];
   
            $name = time().".".$ext;
            $img = Image::make($request->resort_image)->resize(240,200);
            $upload_path = 'upload/resort/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

        Resort::create([
                        'resort_name' => $request->resort_name,
                        'resort_location' => $request->resort_location,
                        'resort_image' =>$image_url,
                        'status' => $request->status,

    	              ]);
           }else{
        
        Resort::create([
                        'resort_name' => $request->resort_name,
                        'resort_location' => $request->resort_location,
                        'status' => $request->status,

    	]);
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('resort_image')) {
            $img = Customer::findOrFail($id);
            if ($img->cus_image == 'no_image.jpg') {
                
                $position = strpos($request->cus_image, ';');
                $sub = substr($request->cus_image, 0, $position);
                $ext = explode('/', $sub)[1];
       
                $name = time().".".$ext;
                $img = Image::make($request->cus_image)->resize(240,200);
                $upload_path = 'upload/customer/';
                $image_url = $upload_path.$name;
                $img->save($image_url);
    
                Resort::findOrFail($id)->update([
                'resort_name' => $request->resort_name,
                'resort_location' => $request->resort_location,
                'resort_image' =>$image_url,
                'status' => $request->status,

                ]);
            } else {
                unlink($img->cus_image);
                $position = strpos($request->cus_image, ';');
                $sub = substr($request->cus_image, 0, $position);
                $ext = explode('/', $sub)[1];
       
                $name = time().".".$ext;
                $img = Image::make($request->cus_image)->resize(240,200);
                $upload_path = 'upload/customer/';
                $image_url = $upload_path.$name;
                $img->save($image_url);
    
            Resort::findOrFail($id)->update([
                'resort_name' => $request->resort_name,
                'resort_location' => $request->resort_location,
                'resort_image' =>$image_url,
                'status' => $request->status,
    
            ]);
            }
            
          
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Resort::findOrFail($id);
        if ($delete->resort_image == 'no_image.jpg') {
            $delete->delete();
        } else {
            unlink($delete->resort_image);
            $delete->delete();
        }
    }
}
