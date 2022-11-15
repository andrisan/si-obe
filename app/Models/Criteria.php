<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    public function criteriaLevels()
    {
        return $this->hasMany(CriteriaLevel::class);
    }
}
