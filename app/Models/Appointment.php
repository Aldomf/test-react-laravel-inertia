<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function conseiller()
    {
        return $this->belongsTo(User::class, 'conseiller_id');
    }

    public function jeune()
    {
        return $this->belongsTo(User::class, 'jeune_id')->with('information');
    }
}
