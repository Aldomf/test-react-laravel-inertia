<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joboffer extends Model
{
    use HasFactory;

    protected $table = 'joboffer';
    
    protected $fillable = [
        'title', 'job', 'description', 'publication','type',
        'actif', 'user_id'
    ];

    // Définir la relation avec le modèle User (si applicable)
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
    // Définir la relation avec la table "Informations"
    public function information()
    {
        // Clé étrangère : user_id dans la table Joboffer et id dans la table Informations
        return $this->belongsTo(Information::class, 'user_id', 'id');
    }
    
}
