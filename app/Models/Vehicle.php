<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Vehicle extends Model
{

    use HasFactory, Notifiable;

    protected $guarded = ['*'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }

}
