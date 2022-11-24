<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'created_at',
        'updated_at',
        'assignment_style'
    ];

    public function assignmentPlanTasks()
    {
        return $this->hasMany(AssignmentPlanTask::class, 'assignment_plan_id');
    }
}