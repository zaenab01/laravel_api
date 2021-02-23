<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hidroponik extends Model
{
    use HasFactory;
    protected $table = 'hidroponiks';
    public $timestamps = true;

    protected $casts = [
        'cost' => 'float'
    ];

    protected $fillable = [
        'name',
        'introduction',
        'created_at',
        'location',
        'cost'
    ];
}
