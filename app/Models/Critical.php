<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critical extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'critical_level',
        'detail',
    ];
}
