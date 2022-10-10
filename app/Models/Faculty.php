<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';

    public $timestamps = false;

    use HasFactory;

    public function studyPrograms()
    {
        return $this->hasMany(StudyProgram::class);
    }
}
