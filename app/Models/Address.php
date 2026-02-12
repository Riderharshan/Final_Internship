<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Address.php
class Address extends Model
{
    protected $fillable = [
        'user_id','label','name','email','phone',
        'address','city','pincode','map_link'
    ];
}

