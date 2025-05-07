<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Vehicle extends Model
{

    use HasFactory, Notifiable;

    protected $guarded = [];


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
