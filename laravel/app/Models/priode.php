<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class priode extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_peternakan',
        'tgl_mulai',
        'tgl_akhir',
        'aktif'
    ];
    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'peternakan_id');
    }
    public function peternakan()
    {
        return $this->belongsTo(peternakan::class, 'id_peternakan');
    }
}
