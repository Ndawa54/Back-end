<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Single extends Model
{
    use HasFactory;
      protected $fillable = [
        'artist',
        'title',
        'image',
        'audio',
        'hot',
        'img_type',
    ];
}
