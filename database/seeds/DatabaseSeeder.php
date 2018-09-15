<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ScorecardSeeder::class);
        $this->call(StrategicObjectiveSeeder::class);
        $this->call(KeyPerformanceIndicatorSeeder::class);
    }
}
