<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = [
        'name',
        'district',
        'damaged_buildings',
        'displaced_families',
        'accessible',
        'population',
    ];

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function emergencyProfile() {
        return $this->hasOne(EmergencyProfile::class);
    }

    public function aidOrganizations() {
        return $this->belongsToMany(AidOrganization::class);
    }
}
