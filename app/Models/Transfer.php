<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function oldUserVehicles() 
    {
        return $this->belongsToMany(UserVehicle::class, 'transfer_old_user_vehicle', 'transfer_id', 'user_vehicle_id');
    }

    public function newUserVehicles()
    {
        return $this->belongsToMany(UserVehicle::class, 'transfer_new_user_vehicle', 'transfer_id', 'user_vehicle_id');
    }

}
