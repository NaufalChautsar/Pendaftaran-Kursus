<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['admin_id'];
    protected $primaryKey = 'admin_id';

    protected $hidden = [
        'password', 
        'remember_token'
    ];

    public $timestamps = false;
}
