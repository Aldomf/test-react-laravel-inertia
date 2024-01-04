<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    
    protected $fillable = [
        // Pour les jeunes
        'first_name', 'last_name', 'gender', 'address', 'phone', 'email',
        'situation', 'housing', 'income', 'education_level', 'cv_path',
        // Pour les entreprises 
        'company_name', 'siret', 'company_address', 'company_phone', 'company_email',
        'website', 'legal_form', 'rcs', 'description', 'responsible_name', 
        
        'user_id' // Clé étrangère pour faire référence à l'utilisateur
    ];

    // Définir la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
