<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    use HasFactory;

    protected $table = 'teacher_profile';

    protected $fillable = [
        'user_id',
        'citizenship',
        'sex',
        'photo',
        'intro',
        'skill'
    ];

    public function userid()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
