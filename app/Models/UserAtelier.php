<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAtelier extends Model
{
    use HasFactory;

    protected $table = 'user_atelier'; // Nom de la table

    protected $fillable = [
        'user_id',
        'training_id',
        'status'
        // Ajoutez d'autres champs si nécessaire
    ];
    public function atelier()
    {
        return $this->belongsTo(Atelier::class, 'atelier_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
