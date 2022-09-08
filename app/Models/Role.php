<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'user_roles';

    public const ADMIN = 1;
    public const CANDIDATE = 2;
    public const EMPLOYER = 3;
    public const USER = 4;

    public function users() {
        return $this->hasMany(User::class, 'role_id');
    }
}