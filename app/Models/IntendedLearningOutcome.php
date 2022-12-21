<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntendedLearningOutcome extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'position',
        'description',
        'code'
    ];

    public function courseLearningOutcomes()
    {
        return $this->hasMany(CourseLearningOutcome::class, 'ilo_id');
    }

    public function clos()
    {
        return $this->courseLearningOutcomes();
    }

    public function syllabus()
    {
        return $this->belongsTo(Syllabus::class);
    }
}
