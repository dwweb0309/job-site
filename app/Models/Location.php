<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function companies() {
        return $this->hasMany(Company::class, 'location');
    }

    public function profiles() {
        return $this->hasMany(Profile::class, 'location');
    }

    public function listings() {
        return $this->hasMany(Listing::class, 'location');
    }
}