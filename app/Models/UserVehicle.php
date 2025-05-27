<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVehicle extends Model
{

    protected $table = 'user_vehicle';

    public function transfersAsOld()
    {
        return $this->belongsToMany(Transfer::class, 'transfer_old_user_vehicle', 'user_vehicle_id', 'transfer_id');
    }

    public function transfersAsNew()
    {
        return $this->belongsToMany(Transfer::class, 'transfer_new_user_vehicle', 'user_vehicle_id', 'transfer_id');
    }

    public function report()
    {
        return $this->belongsToMany(Report::class, 'report_user_vehicle', 'user_vehicle_id', 'report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

}
