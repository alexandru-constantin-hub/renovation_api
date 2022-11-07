<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    use HasFactory;
    protected $fillable = [
        'piece',
        'description',
        'budget',
        'Y-m-d',
        'user_id'
    ];
    

}
