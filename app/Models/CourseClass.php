<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'class_code',
        'thumnbnail_img'
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'join_classes',
            'course_class_id', 'student_user_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}