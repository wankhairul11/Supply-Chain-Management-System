<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    // A purchase order belongs to one supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // A purchase order can have many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
