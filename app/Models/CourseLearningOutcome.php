<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLearningOutcome extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'ilo_id',
        'position',
        'code',
        'description',
    ];

    public function intendedLearningOutcome(){
        return $this->belongsTo(IntendedLearningOutcome::class, 'ilo_id');
    }

    public function lessonLearningOutcomes()
    {
        return $this->hasMany(LessonLearningOutcome::class, 'clo_id');
    }

    public function llos()
    {
        return $this->lessonLearningOutcomes();
    }

    public function syllabus()
    {
        return $this->belongsTo(Syllabus::class);
    }
}
