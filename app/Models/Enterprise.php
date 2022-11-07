<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'code',
        'adresse',
        'ville',
        'region',
        'telephone',
        'email',
        'website',
        'logo',
        'description',
        'user_id'
    ];
}
