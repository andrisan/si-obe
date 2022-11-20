<?php

namespace App\Models;

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
        'description',
        'max_point'
    ];

    public function criteriaLevels()
    {
        return $this->hasMany(CriteriaLevel::class);
    }
}
