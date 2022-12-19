<?php

namespace App\Models;

use App\Http\Controllers\CriteriaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'assignment_plan_id'];

    protected $attributes = [
        'assignment_plan_id' => 1,
    ];

    public function criterias()
    {
        return $this->hasMany(Criteria::class, 'rubric_id');
    }

    public function assignmentPlan()
    {
        return $this->belongsTo(AssignmentPlan::class, 'assignment_plan_id');
    }
}
