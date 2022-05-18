<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::latest()->get();
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
            'cus_name' => 'required|unique:customers|max:255',
            'cus_email' => 'required|unique:customers',
            'cus_phone' => 'required|unique:customers',
   
           ]);
           if ($request->cus_image) {
            $position = strpos($request->cus_image, ';');
            $sub = substr($request->cus_image, 0, $position);
            $ext = explode('/', $sub)[1];
   
            $name = time().".".$ext;
            $img = Image::make($request->cus_image)->resize(240,200);
            $upload_path = 'upload/customer/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

	Customer::create([
		'cus_name' => $request->cus_name,
		'cus_email' => $request->cus_email,
		'cus_phone' => $request->cus_phone,
		'cus_address' => $request->cus_address,
		'status' => $request->status,
		'cus_image' =>$image_url,

    	]);
           }else{
        
	Customer::create([
		'cus_name' => $request->cus_name,
		'cus_email' => $request->cus_email,
		'cus_phone' => $request->cus_phone,
		'cus_address' => $request->cus_address,
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
       return Customer::findOrFail($id);
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
        if ($request->file('cus_image')) {
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
    
        Customer::findOrFail($id)->update([
            'cus_name' => $request->cus_name,
            'cus_email' => $request->cus_email,
            'cus_phone' => $request->cus_phone,
            'cus_address' => $request->cus_address,
            'status' => $request->status,
            'cus_image' =>$image_url,
    
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
    
        Customer::findOrFail($id)->update([
            'cus_name' => $request->cus_name,
            'cus_email' => $request->cus_email,
            'cus_phone' => $request->cus_phone,
            'cus_address' => $request->cus_address,
            'status' => $request->status,
            'cus_image' =>$image_url,
    
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
        $customer = Customer::findOrFail($id);
        if ($customer->cus_image == 'no_image.jpg') {
            $customer->delete();
        } else {
            unlink($customer->cus_image);
            $customer->delete();
        }
        
       
    }
}
