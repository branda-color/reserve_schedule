<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenTime extends Model
{
    use HasFactory;

    protected $table = 'opentime';

    protected $fillable = [
        'user_id',
        'year',
        'month',
        'week',
        'day',
        'time'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];


    public function userid()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
