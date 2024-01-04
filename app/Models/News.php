<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description','image_path','place','hashtag',
        'user_id' 
    ];


     // Définir la relation avec le modèle User
     public function user()
     {
         return $this->belongsTo(User::class);
     }

    //  public function getImageUrlAttribute()
    // {
       
    //     return asset('images/' . $this->image_path);
    // }
}
