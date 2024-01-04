<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preregistrations extends Model
{
    use HasFactory;

    protected $fillable = [
        'password', 'valid', 'role',
            // Pour les jeunes
        'first_name', 'last_name', 'phone', 'email', 'city', 'dateOfBirth', 
            // Pour les entreprises
        'company_name', 'siret', 'company_phone', 'company_email', 'responsible_name' 
    ];

    // Définir la relation avec le modèle User (si applicable)
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // Définir la relation avec le modèle Information (si applicable)
    public function information()
    {
        return $this->hasOne(Information::class);
    }
    
}
