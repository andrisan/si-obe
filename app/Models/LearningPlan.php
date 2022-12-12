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
        'week_number',
        'llo_id',
        'study_material',
        'learning_method',
        'estimated_time',
    ];

    public function syllabus()
    {
        return $this->belongsTo(Syllabus::class,'syllabus_id');
    }

    public function lessonLearningOutcome()
    {
        return $this->belongsTo(LessonLearningOutcome::class,'llo_id');
    }
}
