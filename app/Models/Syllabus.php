<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title','head_of_study_program','author'
    ];
    public function studyProgram()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function ilos()
    {
        return $this->intendedLearningOutcomes();
    }

    public function intendedLearningOutcomes()
    {
        return $this->hasMany(IntendedLearningOutcome::class, 'syllabus_id');
    }

    public function assignmentPlans()
    {
        return $this->hasMany(AssignmentPlan::class, 'syllabus_id');
    }

    public function learningPlans()
    {
        return $this->hasMany(LearningPlan::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
