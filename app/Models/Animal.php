<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
