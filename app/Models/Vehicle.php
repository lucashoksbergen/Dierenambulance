<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function vehicleswap()
    {
        return $this->belongsToMany(VehicleSwap::class);
    }


}
