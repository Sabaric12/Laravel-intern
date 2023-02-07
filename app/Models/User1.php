<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticateable;

class User1 extends Authenticateable
{
    use HasFactory;
    protected $table='user1s';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
