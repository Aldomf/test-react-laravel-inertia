<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description', 'image_path',
        'actif', 'user_id'
    ];

    // Définir la relation avec le modèle User (si applicable)
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
