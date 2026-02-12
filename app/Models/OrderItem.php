<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',     // ✅ IMPORTANT (used for image, rating, reorder)
        'product_name',
        'price',
        'quantity',
    ];

    /**
     * Order this item belongs to
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Product related to this order item
     * (used for image, rating, reorder)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
