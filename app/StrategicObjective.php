<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StrategicObjective extends Model
{
    const PERSPECTIVES = [
        'FINANCIAL', 'CUSTOMER',
        'INTERNAL_BUSINESS_PROCESS', 'LEARNING_AND_GROWTH'
    ];

    public $fillable = [
        'scorecard_id',
        'name',
        'perspective'
    ];

    public function key_performance_indicators()
    {
        return $this->hasMany(KeyPerformanceIndicator::class);
    }
}
