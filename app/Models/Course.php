<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    use HasFactory;

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

    public function courseClasses(){
        return $this->hasMany(CourseClass::class);
    }

    public function syllabuses()
    {
        return $this->hasMany(Syllabus::class);
    }
}
