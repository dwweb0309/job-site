<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'listing_candidate', 'candidate_id', 'listing_id');
    }

    public function is_employer() {
        return $this->role_id == Role::EMPLOYER;
    }

    public function is_candidate() {
        return $this->role_id == Role::CANDIDATE;
    }

    public function is_admin() {
        return $this->role_id == Role::ADMIN;
    }

    public function avatar_url() {
        $default_url = 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80';

        if ($this->is_employer()) {
            return $this->company->logo ?? $default_url;
        } else {
            return $this->profile->photo_url ?? $default_url;
        }
    }

    public static function candidates()
    {
        $candidate = Role::find(Role::CANDIDATE);

        return $candidate->users();
    }

    public static function employers()
    {
        $employer = Role::find(Role::EMPLOYER);

        return $employer->users();
    }
}
