<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentPlanTask extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'criteria_id',
        'description'
    ];

    public function criteria()
    {
        return $this->hasOne(Criteria::class, 'id', 'criteria_id');
    }

    public function gradingPlans()
    {
        return $this->hasMany(GradingPlan::class);
    }

    public function assignmentPlan()
    {
        return $this->belongsTo(AssignmentPlan::class);
    }
}
