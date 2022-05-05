<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $table = 'reserve';

    protected $fillable = [
        'user_id',
        'student_id',
        'year',
        'month',
        'week',
        'day',
        'start_time',
        'end_time'
    ];

}
