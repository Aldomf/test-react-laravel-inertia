<?php

namespace App\Models;
use App\Models\Information;
use App\Models\Notification;
use App\Models\Appointment;
use App\Models\AppointmentEntreprise;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'actif',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function information()
    {
        return $this->hasOne(Information::class);
    }

    public function conseillerJeunes()
    {
        return $this->hasMany(ConseillerJeune::class, 'conseiller_id');
    }

    public function jeunes()
    {
        return $this->hasManyThrough(
            User::class,
            ConseillerJeune::class,
            'conseiller_id', // Foreign key on ConseillerJeune table
            'id', // Local key on User table
            'id', // Local key on ConseillerJeune table
            'jeune_id' // Foreign key on User table
        );
    }

    // Dans le modèle User
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'conseiller_id');
    }

    public function appointmentsEntreprise()
    {
        return $this->hasMany(AppointmentEntreprise::class, 'business_id');
    }
    public function rendezVous()
    {
        return $this->hasMany(Appointment::class, 'jeune_id');
    }
    public function userTrainings()
    {
        return $this->belongsToMany(Training::class, 'user_training', 'user_id', 'training_id')
            ->withPivot('status');
    }

    public function ateliers()
    {
        return $this->belongsToMany(Atelier::class, 'user_atelier', 'user_id', 'atelier_id')->withTimestamps();
    }
    public function userAteliers()
    {
        return $this->belongsToMany(Atelier::class, 'user_atelier', 'user_id', 'atelier_id')
            ->withPivot('status');
    }

    public function userJobOffer()
    {
        return $this->belongsToMany(Joboffer::class, 'user_job_offer', 'user_id', 'job_offer_id')
            ->withPivot('status');
    }
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'DESC');
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }


    public function entreprises()
    {
        return $this->hasManyThrough(
            User::class,
            BusinessManagerEntreprise::class,
            'business_Manager_id', // Foreign key on ConseillerJeune table
            'id', // Local key on User table
            'id', // Local key on ConseillerJeune table
            'entreprise_id' // Foreign key on User table
        );
    }

}
