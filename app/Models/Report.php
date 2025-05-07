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
        return $this->belongsToMany(User::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
