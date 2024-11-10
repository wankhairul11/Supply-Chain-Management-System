<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // A location belongs to one warehouse
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
