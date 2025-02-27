<?php

namespace App\Models;

use App\Traits\HasUlid;
use App\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasUlid, HasDatatable;

    protected $fillable = ['name', 'email', 'password', 'role_id', 'profile', 'status'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Helper to get permissions
    public function permissions()
    {
        return $this->role && $this->role->permissions
            ? json_decode($this->role->permissions, true)
            : [];
    }
}
