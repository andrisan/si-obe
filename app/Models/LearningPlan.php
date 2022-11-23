<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningPlan extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function syllabus()
    {
        return $this->belongsTo(Syllabus::class);
    }

    public function lessonLearningOutcome()
    {
        return $this->belongsTo(LessonLearningOutcome::class);
    }
}
