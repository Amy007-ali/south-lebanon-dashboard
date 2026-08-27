<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AidOrganization extends Model
{
    protected $fillable = [
        'name',
        'type',
    ];

    public function villages() {
        return $this->belongsToMany(Village::class);
    }
}
