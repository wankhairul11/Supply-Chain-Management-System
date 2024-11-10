<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    // A supplier can have many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // A supplier can have many purchase orders
    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
