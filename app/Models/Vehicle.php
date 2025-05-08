<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Vehicle extends Model
{

    use HasFactory, Notifiable;

    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_vehicle');
    }

    public function vehicleSwap()
    {
        return $this->belongsToMany(VehicleSwap::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }


}
