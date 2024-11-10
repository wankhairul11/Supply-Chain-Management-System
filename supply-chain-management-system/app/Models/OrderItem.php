<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // An order item belongs to one purchase order
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    // An order item belongs to one product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
