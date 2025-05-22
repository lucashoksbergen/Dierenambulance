<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Animal;
use App\Models\Payment;

class Report extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userVehicles()
    {
        return $this->belongsToMany(UserVehicle::class, 'report_user_vehicle', 'report_id', 'user_vehicle_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function caller()
    {
        return $this->belongsTo(Caller::class);
    }

}
