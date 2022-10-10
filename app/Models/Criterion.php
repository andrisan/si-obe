<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    use HasFactory;

    public $table = 'criterion';

    public $timestamps = false;

    public function criterionLevels()
    {
        return $this->hasMany(CriterionLevel::class);
    }
}
