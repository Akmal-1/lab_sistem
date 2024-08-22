<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Definisikan relasi many-to-many dengan roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Buat accessor untuk mendapatkan role pertama
    public function getFirstRoleAttribute()
    {
        return $this->roles()->first();
    }

    // Fungsi untuk memeriksa apakah user memiliki role tertentu
    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }
}
