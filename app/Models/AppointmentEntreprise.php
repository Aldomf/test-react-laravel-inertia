<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentEntreprise extends Model
{
    use HasFactory;
    
    protected $table = 'appointmentEntreprise'; 

    public function business()
    {
        return $this->belongsTo(User::class, 'business_id');
    }

    public function entreprise()
    {
        return $this->belongsTo(User::class, 'entreprise_id')->with('information');
    }
}
