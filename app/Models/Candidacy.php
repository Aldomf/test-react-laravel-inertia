<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'joboffre_id', 'user_id','training_id','mission_id'
    ];

    // Définir la relation avec le modèle User (si applicable)
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function joboffer()
    {
        return $this->hasOne(Joboffer::class);
    }

    public function training()
    {
        return $this->hasOne(Training::class);
    }
}
