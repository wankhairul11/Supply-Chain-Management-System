<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // A product belongs to a single supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // A product can belong to many inventories
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    // A product can be part of many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
