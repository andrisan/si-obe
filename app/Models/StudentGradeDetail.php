<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGradeDetail extends Model
{
    use HasFactory;

    public function studentGrade()
    {
        return $this->belongsTo(StudentGrade::class, 'student_grade_id');
    }

    public function criteriaLevel()
    {
        return $this->belongsTo(CriteriaLevel::class, 'criteria_level_id');
    }

    public function AssignmentPlanTask()
    {
        return $this->belongsTo(AssignmentPlanTask::class, 'assignment_plan_task_id');
    }
}
