<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'region',
        'capital',
        'native_name',
        'languages',
        'currencies',
        'image'
    ];
}
