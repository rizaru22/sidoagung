<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peternakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'noHp',
    ];

    public function priodes()
    {
        return $this->hasMany(priode::class, 'id_peternakan');
    }
}
