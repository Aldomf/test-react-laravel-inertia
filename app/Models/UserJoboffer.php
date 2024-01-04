<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJoboffer extends Model
{
    use HasFactory;
    
    protected $table = 'user_job_offer'; // Nom de la table

    protected $fillable = [
        'user_id',
        'job_offer_id',
        // Ajoutez d'autres champs si nécessaire
    ];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le modèle JobOffer
    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }
}
