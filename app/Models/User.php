<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["user", "admin", "ketua", "member"][$value] ?? 'user',
        );
    }

    // Jika ada method untuk akses foto profil, bisa ditambahkan di sini
    public function profilePhotoUrl()
    {
        return $this->profile_photo_path ? asset('storage/' . $this->profile_photo_path) : 'default-profile.png';
    }
}
