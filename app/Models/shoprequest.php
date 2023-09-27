<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoprequest extends Model
{
    use HasFactory;
    protected $fillable = ['requestdate', 'shopid', 'permission', 'staffid'];
}
