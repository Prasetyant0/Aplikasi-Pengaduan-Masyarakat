<?php

namespace App\Models;

use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
    'kategori',
    'deskripsi'
    ];

    public function PengaduanKategori(): HasMany
    {
    return $this->hasMany(Pengaduan::class, 'kategori_id');
    }
}
