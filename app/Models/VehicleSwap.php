<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleSwap extends Model
{
    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
