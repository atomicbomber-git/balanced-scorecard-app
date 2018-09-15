<?php

use Illuminate\Database\Seeder;

class StrategicObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scorecard_ids = App\Scorecard::select('id')
            ->pluck('id');

        foreach ($scorecard_ids as $scorecard_id) {
            foreach (App\StrategicObjective::PERSPECTIVES as $perspective) {
                factory(App\StrategicObjective::class, 2)->create([
                    'scorecard_id' => $scorecard_id,
                    'perspective' => $perspective
                ]);
            }
        }
    }
}
