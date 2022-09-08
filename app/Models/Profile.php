<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'linkedin_url',
        'whatsapp',
        'photo_url',
        'location_id',
        'nationality',
        'dob',
        'gender',
        'expected_salary',
        'currency_code',
        'description'
    ];

    public function location() {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'profiles_tags', 'profile', 'tag');
    }
}