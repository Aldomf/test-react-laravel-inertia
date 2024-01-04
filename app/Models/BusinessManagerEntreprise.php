<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessManagerEntreprise extends Model
{
    use HasFactory;

    protected $table = 'business_manager_entreprise';

    protected $fillable = [
        'businessManager_id',
        'entreprise_id',
    ];

    // Relation avec le modèle User pour le conseiller
    public function businessManager()
    {
        return $this->belongsTo(User::class, 'businessManager_id');
    }

    // Relation avec le modèle User pour le jeune
    public function entreprise()
    {
        return $this->belongsTo(User::class, 'entreprise_id');
    }

    public function rendezVous()
    {
        return $this->hasMany(Appointment::class, 'entreprise_id', 'entreprise_id');
    }
}
