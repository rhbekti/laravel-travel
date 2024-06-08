<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookingId');
    }

    public static function getDataByUserId($userId)
    {
        return self::where('userId', $userId)->orderBy('id', 'DESC')->get();
    }
}
