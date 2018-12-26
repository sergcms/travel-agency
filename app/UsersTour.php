<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersTour extends Model
{
    protected $fillable = [
        'user_id',
        'tour_id',
    ];
}
