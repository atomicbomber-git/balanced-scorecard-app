<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyPerformanceIndicator extends Model
{
    public $fillable = [
        'strategic_objective_id',
        'name',
        'action_plan',
        'current',
        'target',
        'actual',
        'weight'
    ];
}
