<?php

namespace App\Models;
use App\Models\Rubric;
use App\Models\LessonLearningOutcome;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $rubric_id
 * @property int $llo_id
 * @property string $title
 * @property string $description
 * @property float $max_point
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'rubric_id',
        'llo_id',
        'description',
        'max_point'
    ];

    public function criteria()
    {
        return $this->hasOne(Criteria::class);
    }

    public function rubrics()
    {
        return $this->hasOne(Rubrics::class, 'rubric_id');
    }

    public function lessonLearningOutcome()
    {
        return $this->belongsTo(LessonLearningOutcome::class,'llo_id');
    }
}
