<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $fillable = [
    'NIK',
    'jenis_kelamin',
    'no_telp',
    'alamat',
    'nama_lengkap',
    'email',
    'password',
    'foto_profile',
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

    public function PengirimTanggapan(): HasMany
    {
    return $this->hasMany(Tanggapan::class, 'id_users', 'users_id');
    }

    public function PengirimPengaduan(): HasMany
    {
    return $this->hasMany(Pengaduan::class, 'id_users', 'users_id');
    }

    public function isAdmin()
    {
        return $this->role == 'Admin';
    }

    public function isPetugas()
    {
        return $this->role == 'Petugas';
    }
    public function isMasyarakat()
    {
        return $this->role == 'Masyarakat';
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
