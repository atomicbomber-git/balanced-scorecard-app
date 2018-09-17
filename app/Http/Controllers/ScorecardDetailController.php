<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scorecard;

class ScorecardDetailController extends Controller
{
    public function index(Scorecard $scorecard)
    {
        $scorecard->load([
            'strategic_objectives:id,scorecard_id,perspective,name',
            'strategic_objectives.key_performance_indicators:strategic_objective_id,name,action_plan,current,target,actual,weight'
        ]);

        $perspectives = $scorecard
            ->strategic_objectives
            ->map(function ($objective) {
                $objective->kpi_count = $objective->key_performance_indicators->count();
                return $objective;
            })
            ->groupBy('perspective');

        return view('scorecard_detail.index', compact('scorecard', 'perspectives'));
    }
}
