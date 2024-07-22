<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;


    protected $fillable = [
        'departamento',
        'alcaldia',
        'alcaldia_logo_active',
        'departamento_logo_active',
        'status_complete'
    ];
}
