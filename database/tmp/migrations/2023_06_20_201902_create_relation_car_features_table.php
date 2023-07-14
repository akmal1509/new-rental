<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_car_features', function (Blueprint $table) {
            $table->unsignedBigInteger('carId');
            $table->unsignedBigInteger('featureId');
            $table->text('value')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('carId')
                ->references('id')
                ->on('cars')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('featureId')
                ->references('id')
                ->on('car_features')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_car_features');
    }
};
