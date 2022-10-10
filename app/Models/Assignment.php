<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public $table = 'assignment';

    public $timestamps = false;

    public function studentGrades()
    {
        return $this->hasMany(StudentGrade::class);
    }
}
