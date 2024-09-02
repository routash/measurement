<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $table = 'measurements';

    protected $fillable = [
        'client_name',
        'details',
    ];

    protected $casts = [
        'details' => 'array',
    ];
}