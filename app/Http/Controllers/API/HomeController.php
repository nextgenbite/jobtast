<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Resort;

class HomeController extends Controller
{
    public function AddBooking(Request $request, $id)
    {
       $customer = Customer::insertGetId([
            'cus_name' => $request->cus_name,
            'cus_email' => $request->cus_email,
            'cus_phone' => $request->cus_phone,
            'cus_address' => $request->cus_address,
    
            ]);
        Reservation::create([
            'customer_id'=>  $customer,
            'resort_id'=> $id,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date
            ]);
    }
}
