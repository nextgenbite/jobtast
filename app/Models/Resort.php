<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    use HasFactory;
    protected $fillable = [
        'resort_name',
        'resort_location',
        'resort_image',
        'status',
    ];
}
