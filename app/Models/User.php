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
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format('M d, Y') : '-';
    }

    public function getInitialsAttribute()
    {
        $parts = explode(' ', $this->name);
        $initials = '';
        foreach ($parts as $p) {
            $initials .= strtoupper(substr($p, 0, 1));
        }
        return $initials;
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }
}
