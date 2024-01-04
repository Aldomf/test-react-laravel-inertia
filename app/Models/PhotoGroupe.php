<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGroupe extends Model
{
    use HasFactory;

    protected $table = 'photo_groupe';

    protected $fillable = [
        'image_path'
    ];

}
