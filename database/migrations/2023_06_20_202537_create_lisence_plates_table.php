<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLisencePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lisence_plates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carId');
            $table->string('plat');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('carId')
                ->references('id')
                ->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lisence_plates');
    }
}
