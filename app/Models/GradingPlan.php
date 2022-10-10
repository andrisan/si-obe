<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingPlan extends Model
{
    use HasFactory;

    public $table = 'grading_plan';

    public $timestamps = false;
}
