<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = [
    'users_id',
    'pengaduan_id',
    'tanggapan'
    ];

    public function TanggapanPengaduan(): BelongsTo
    {
        return $this->belongsTo(Pengaduan::class, 'id_tanggapan');
    }

    public function PengirimTanggapan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id_users');
    }
}
