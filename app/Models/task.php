<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'taskid',
        'taskname',
        'taskdescription',
        'starttime',
        'endtime',
        'taskdate',
        'status',
    ];
}
