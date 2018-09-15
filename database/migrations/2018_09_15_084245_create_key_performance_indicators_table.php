<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyPerformanceIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_performance_indicators', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('strategic_objective_id')->unsigned();

            $table->string('name');

            $table->string('action_plan');

            $table->decimal('current', 10, 4);
            $table->decimal('target', 10, 4);
            $table->decimal('actual', 10, 4)->nullable();

            $table->integer('weight')->unsigned();
            
            $table->foreign('strategic_objective_id')
                ->references('id')
                ->on('strategic_objectives');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_performance_indicators');
    }
}
