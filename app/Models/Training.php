<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'training'; // Specify the custom table name

    protected $fillable = [
        'title', 'job', 'description', 'publication', 'type', 'start', 'end',
        'actif', 'user_id', 'slots', 'image_path', 'place', 'job_summary',
        'objectives', 'duration', 'prerequisites', 'program'
    ];

    // Définir la relation avec le modèle User (si applicable)
    public function users()
    {
        return $this->belongsToMany(User::class,'user_training','training_id','user_id')->withTimestamps();
    }
    public function userTrainings()
{
    return $this->hasMany(UserTraining::class, 'training_id');
}

public function acceptedUsersCount()
{
    return $this->users()->wherePivot('status', 'accepte')->count();
}

}
