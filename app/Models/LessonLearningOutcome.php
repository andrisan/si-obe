<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonLearningOutcome extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function courseLearningOutcome()
    {
        return $this->belongsTo(CourseLearningOutcome::class);
    }
}
