<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    // An inventory entry belongs to one product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // An inventory entry belongs to one warehouse
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
