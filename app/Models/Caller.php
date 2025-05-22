<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caller extends Model
{
    /** @use HasFactory<\Database\Factories\CallerFactory> */
    use HasFactory;

    protected $guarded = [];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
