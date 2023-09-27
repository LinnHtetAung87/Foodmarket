<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;
    protected $fillable = ['shopname', 'address', 'township', 'memberName', 'city', 'email', 'password', 'shoplogo'];

}
