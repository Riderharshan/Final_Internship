<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
     protected $fillable = [
        'user_id',    
        'customer_name',
        'email',
        'phone',
        'address',
        'total',
        'payment_type',
        'payment_status',
        'status',
        'out_for_delivery_at',
    ];
    

    // ✅ ADD THIS RELATIONSHIP
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    // ✅ ADD THIS
    protected $casts = [
        'out_for_delivery_at' => 'datetime',
    ];
    
    public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

}
