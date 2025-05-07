<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Animal extends Model
{

    use HasFactory, Notifiable;

    protected $guarded = [];


    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
