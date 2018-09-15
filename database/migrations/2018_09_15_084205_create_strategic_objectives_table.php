<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrategicObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategic_objectives', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('scorecard_id')->unsigned();
            $table->string('name');
            $table->enum('perspective', [
                'FINANCIAL', 'CUSTOMER',
                'INTERNAL_BUSINESS_PROCESS', 'LEARNING_AND_GROWTH'
            ]);

            $table->foreign('scorecard_id')
                ->references('id')
                ->on('scorecards');

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
        Schema::dropIfExists('strategic_objectives');
    }
}
