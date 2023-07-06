<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class DriversTimetable extends Model
{
    use HasFactory;


    use Sortable;
    public $table = 'drivers';
    
    protected $primaryKey = 'id';


    public $fillable = [
        'Name',
        'email',
        'contact',
        'vechicle_no'
    ];



    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'driver_id');
    }
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
