<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends Authenticatable
{
    const CREATED_AT ='created';
    const UPDATED_AT ='updated';
    protected $table='Utilisateur';
    protected $fillable = ['name','firstnames','email','telephone','photo','ETAT','password_default','passwords'];
}
