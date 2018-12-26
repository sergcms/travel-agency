<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'country', 
        'city', 
        'hotel', 
        'food', 
        'people', 
        'price', 
        'date_start', 
        'date_end', 
        'status', 
    ];
}
