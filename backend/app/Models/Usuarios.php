<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Iluminate\Contracts\Auth\usuarios as Authenticatable;
use Illuniate\Notifications\Notifiable;
use Illuminate\Notifications\Notificable;
use Laravel\Sanctum\HasApiTokens;

class Usuarios extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable =[
        
    ]
}
