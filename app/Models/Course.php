<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Course extends Model 
{
    use Sortable;
    protected $table = 'import';
    protected $primaryKey = 'id';
    protected $fillable = ['date',
    'cn',
     'container_no',
     'ata',
     'skp',
     'expired',
     'size',
     'destination',
    'agent',
     'depot',
     'kb_date',
     'send_date',
     'eco',
     'back_date',
     'trailer',
    'status'];

    public $sortable = ['date',
    'cn',
     'container_no',
     'ata',
     'skp',
     'expired',
     'size',
     'destination',
    'agent',
     'depot',
     'kb_date',
     'send_date',
     'eco',
     'back_date',
     'trailer',
     'status'];
    
    
    

}


