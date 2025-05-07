<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Owner extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];


    public function animal()
    {
        return $this->hasMany(Animal::class);
    }
}
