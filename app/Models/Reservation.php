<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'resort_id',
        'start_date',
        'end_date',
    ];
    public function customer()
    {
        return $this->belongsTo(CustomerController::class, 'customer_id', 'id');
    }
    public function resort()
    {
        return $this->belongsTo(ResortController::class, 'resort_id', 'id');
    }
}
