<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(User::class, 'join_classes',
            'course_class_id', 'student_user_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'course_class_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
