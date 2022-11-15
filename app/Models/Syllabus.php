<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function studyProgram()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function intentedLearningOutcomes()
    {
        return $this->hasMany(IntendedLearningOutcome::class, 'syllabus_id');
    }

    public function assignmentPlans()
    {
        return $this->hasMany(AssignmentPlan::class, 'syllabus_id');
    }
}
