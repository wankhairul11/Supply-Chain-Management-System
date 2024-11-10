<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    // A warehouse can have many inventories
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    // A warehouse can have many locations
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
