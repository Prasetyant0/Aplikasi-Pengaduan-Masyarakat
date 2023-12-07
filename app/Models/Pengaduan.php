<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Tanggapan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
    'kategori_id',
    'users_id',
    'alamat',
    'deskripsi',
    'foto_lampiran',
    'status',
    'judul_pengaduan'
    ];

    public function PengaduanKategori(): BelongsTo
    {
    return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function TanggapanPengaduan(): HasMany
    {
    return $this->hasMany(Tanggapan::class, 'id_tanggapan');
    }

    public function PengirimPengaduan(): BelongsTo
    {
    return $this->belongsTo(User::class, 'users_id', 'id_users');
    }
}
