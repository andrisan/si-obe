<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentPlanTask extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function criteria()
    {
        return $this->hasOne(Criteria::class, 'id', 'criteria_id');
    }
}
