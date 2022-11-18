<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $criteria_id
 * @property float $point
 * @property string $title
 * @property string $description
 */

class CriteriaLevel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'point',
        'title',
        'description'
    ];
}
