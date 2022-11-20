<?php

namespace App\Models;

use App\Models\CourseClass;
use App\Models\StudentGrade;
use App\Models\AssignmentPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function studentGrades()
    {
        return $this->hasMany(StudentGrade::class);
    }

    public function assignmentPlan()
    {
        return $this->belongsTo(AssignmentPlan::class);
    }
    
}
