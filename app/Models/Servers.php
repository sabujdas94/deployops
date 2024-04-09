<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip',
        'port',
        'username',
        'passkey',
        'key_type',
    ];

    protected $casts = [
        'passkey' => 'encrypted'
    ];
}
