<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'apply_url',
        'company_id',
        'remote_allowed',
        'hybrid_allowed',
        'inperson_allowed',
        'salary_min',
        'salary_max',
        'age_min',
        'age_max',
        'currency_code',
        'is_highlighted',
        'is_active'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'listing_tag', 'listing', 'tag');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'listing_category', 'listing_id', 'tag_id');
    }

    public function clicks() {
        return $this->hasMany(Click::class, 'listing_id');
    }

    public function candidates() {
        return $this->hasMany(Candidate::class, 'listing_id', 'user_id');
    }
}
