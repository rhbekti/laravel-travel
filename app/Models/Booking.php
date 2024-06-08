<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getDataByTouristId($touristId)
    {
        return self::where('attractionId', $touristId)->orderBy('totalAmount', 'ASC')->get();
    }

    public function travels()
    {
        return $this->belongsTo(Travel::class, 'travelId');
    }

    public function tourist()
    {
        return $this->belongsTo(TouristAttraction::class, 'attractionId');
    }
}
