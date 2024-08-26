<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Name of table
    protected $table = 'users';

    // Primary key column in table
    protected $primaryKey = 'user_id';

    // Columns that were able to use or modify
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'is_admin'
    ];

    // Column that is hidden for protection
    protected $hidden = [
        'password'
    ];
}
