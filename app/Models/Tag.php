<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'name',
        'slug'
    ];
    
    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'listing_tag', 'tag', 'listing');
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profiles_tags', 'tag', 'profile');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'companies_tags', 'tag', 'company');
    }
}
