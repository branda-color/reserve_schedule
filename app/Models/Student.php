<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';


    protected $fillable = [
        'name',
        'username',
        'mob',
        'email',
        'password',
        'role_id',
        'service_id',
        'timezone',
        'status',
        'class_No'
    ];

    protected $hidden = [
        'name',
        'password',
        'remember_token',
        'status',
        'timezone',
        'mob',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
