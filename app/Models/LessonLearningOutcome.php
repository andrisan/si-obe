<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonLearningOutcome extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'position',
        'description'
    ];

    public function courseLearningOutcome()
    {
        return $this->belongsTo(CourseLearningOutcome::class);
    }

    public function criteria()
    {
        return $this->hasMany(Criteria::class, 'llo_id');
    }

    public function learningPlan()
    {
        return $this->hasMany(LearningPlan::class, 'llo_id');
    }
}
