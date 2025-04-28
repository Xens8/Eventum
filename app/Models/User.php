<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // Correcta importación
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    // Otros métodos y propiedades del modelo
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
}