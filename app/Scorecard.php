<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scorecard extends Model
{
    public $fillable = [
        'year'
    ];

    public function strategic_objectives()
    {
        return $this->hasMany(StrategicObjective::class);
    }

    public function period()
    {
        return $this->year . "-" . ($this->year + 1);
    }
}
