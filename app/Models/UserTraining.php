<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTraining extends Model
{
    use HasFactory;
    
    protected $table = 'user_training'; // Nom de la table

    protected $fillable = [
        'user_id',
        'training_id',
        'status'
        // Ajoutez d'autres champs si nécessaire
    ];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le modèle Training
    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
