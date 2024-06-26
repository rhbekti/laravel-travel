<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';
    protected $guarded = [];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
