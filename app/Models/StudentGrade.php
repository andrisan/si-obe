<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Assignment;

class StudentGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_user_id',
        'assignment_id',
        'assignment_plan_task_id',
        'criteria_level_id'
    ];

    public function criteriaLevel()
    {
        return $this->belongsTo(CriteriaLevel::class, 'criteria_level_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'student_user_id');
    }
    public function Assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }
    public function AssignmentPlanTask()
    {
        return $this->belongsTo(AssignmentPlanTask::class, 'assignment_plan_task_id');
    }
}
