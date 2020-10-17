<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'name', 
        'email',
        'username',
        'password',
        'email_verfied_at',
        'address',
        'no_phone',
    ];

    protected $hidden = ['password'];
}
