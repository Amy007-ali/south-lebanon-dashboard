<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyProfile extends Model
{
    protected $fillable = [
        'village_id',
        'priority_level',
        'emergency_contact',
        'notes',
    ];

    public function village() {
        return $this->belongsTo(Village::class);
    }
}
