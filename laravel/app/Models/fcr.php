<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fcr extends Model
{
    use HasFactory;
    protected $fillable = [
        'bw',
        'fcr',
        'mor',
    ];
}
