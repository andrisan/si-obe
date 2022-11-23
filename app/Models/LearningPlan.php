<?php

namespace App\Models;
use App\Models\Syllabus;
use App\Models\LessonLearningOutcome;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningPlan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'Week Number',
        'LLO_ID',
        'studyMaterial',
        'learningMethod',
        'estTime',
        'updatedAt',
    ];

    public function syllabi()
    {
        return $this->belongsTo(Syllabus::class);
    }

    public function lessonLearningOutcome()
    {
        return $this->belongsTo(LessonLearningOutcome::class);
    }
}
