<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    use HasFactory;

    public function criteria_levels()
    {
        return $this->belongsTo(CriteriaLevel::class);
    }
}
