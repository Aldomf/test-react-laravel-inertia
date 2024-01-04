<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    use HasFactory;

    protected $table = 'atelier';
    
    protected $fillable = [
        'title', 'description','resume','objectif','image_path', 'place' , 'user_id', 'date','actif','slots'
    ];

    // Définir la relation avec le modèle User (si applicable)
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_atelier', 'atelier_id', 'user_id')->withTimestamps();
    }
    // Définir la relation avec la table "Informations"
    public function information()
    {
        // Clé étrangère : user_id dans la table atelier et id dans la table Informations
        return $this->belongsTo(Information::class, 'user_id', 'id');
    }
    public function userAtelier()
    {
        return $this->hasMany(userAtelier::class, 'training_id');
    }

    public function acceptedUsersCount()
    {
        return $this->users()->wherePivot('status', 'accepte')->count();
    }

    
}