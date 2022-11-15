<?php

namespace App\Models;

use App\Http\Controllers\CriteriaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function criteria()
    {
        return $this->hasMany(Criteria::class);
    }
}
