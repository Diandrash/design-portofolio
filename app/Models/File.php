<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;


class File extends Model
{
    use HasFactory;
    use MediaAlly;

    protected $fillable = [
        'name', 
        'path'
    ];
}
