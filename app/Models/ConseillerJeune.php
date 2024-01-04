<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConseillerJeune extends Model
{
       use HasFactory;

    protected $table = 'conseiller_jeune';

    protected $fillable = [
        'conseiller_id',
        'jeune_id',
    ];

    // Relation avec le modèle User pour le conseiller
    public function conseiller()
    {
        return $this->belongsTo(User::class, 'conseiller_id');
    }

    // Relation avec le modèle User pour le jeune
    public function jeune()
    {
        return $this->belongsTo(User::class, 'jeune_id');
    }

    public function rendezVous()
    {
        return $this->hasMany(Appointment::class, 'jeune_id', 'jeune_id');
    }

    
}
