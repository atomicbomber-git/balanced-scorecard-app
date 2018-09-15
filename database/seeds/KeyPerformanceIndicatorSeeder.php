<?php

use Illuminate\Database\Seeder;
use App\Scorecard;
use App\KeyPerformanceIndicator;
use Illuminate\Support\Collection;

class KeyPerformanceIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scorecards = Scorecard::query()
            ->select('id')
            ->with('strategic_objectives:id,scorecard_id')
            ->get();
        
        $kpi_per_objective = 5;

        foreach ($scorecards as $scorecard) {
            
            $objective_count = $scorecard->strategic_objectives->count();
            $weight_per_kpi = intdiv(100, $objective_count * $kpi_per_objective);
            $weights = Collection::times(($objective_count * $kpi_per_objective) - 1, function() use($weight_per_kpi) {
                return $weight_per_kpi;
            });
            $weights->push($weight_per_kpi + 100 % ($objective_count * $kpi_per_objective));

            foreach ($scorecard->strategic_objectives as $objective) {
                factory(KeyPerformanceIndicator::class, $kpi_per_objective)
                    ->make()
                    ->each(function($kpi) use($objective, $weights) {
                        $kpi->strategic_objective_id = $objective->id;
                        $kpi->weight = $weights->pop();
                        $kpi->save();
                    });
            }
        }
    }
}
