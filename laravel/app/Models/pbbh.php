<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pbbh extends Model
{
    use HasFactory;
    protected $fillable = [
        'umur',
        'pbbh',
        'eph',
    ];
}
