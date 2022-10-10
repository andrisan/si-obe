<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentPlanTask extends Model
{
    use HasFactory;

    public $table = 'assignment_plan_task';

    public $timestamps = false;

    public function criterion()
    {
        return $this->hasOne(Criterion::class, 'id', 'criterion_id');
    }
}
