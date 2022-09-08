<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'website',
        'logo',
        'name',
        'location_id',
        'credits',
        'description'
    ];

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'companies_tags', 'company', 'tag');
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function listings() {
    	return $this->hasMany(Listing::class, 'company_id');
    }

    public function industries() {
        return $this->belongsToMany(Industry::class, 'company_industry', 'company_id', 'industry_id');
    }
}
