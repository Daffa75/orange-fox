<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasSuperAdmin, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() == 'admin') {
            return true;
        }
        return false;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function perikananPost(): HasMany
    {
        return $this->hasMany(PerikananPost::class);
    }
    public function peternakanPost(): HasMany
    {
        return $this->hasMany(PeternakanPost::class);
    }
    public function perikananOffering(): HasMany
    {
        return $this->hasMany(PerikananOffering::class);
    }
    public function peternakanOffering(): HasMany
    {
        return $this->hasMany(PeternakanOffering::class);
    }
}
