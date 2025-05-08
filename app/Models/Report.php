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


    public function user() // Callcenter person
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function driver() // Callcenter person
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function codriver() // Callcenter person
    {
        return $this->belongsTo(User::class, 'codriver_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'payment_id');
    }




}
