<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentPlan extends Model
{
    use HasFactory;

    public function assignmentPlanTasks()
    {
        return $this->hasMany(AssignmentPlanTask::class);
    }
}
