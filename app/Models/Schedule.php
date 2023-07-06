<?php
 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'driver_id',
        'date',
        'start_time',
        'end_time',
        // Add other schedule fields here
    ];

    // Define the relationship with the Driver model
    public function driver()
    {
        return $this->belongsTo(DriversTimetable::class, 'driver_id');
    }
}

