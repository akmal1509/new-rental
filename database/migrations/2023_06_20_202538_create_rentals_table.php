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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('platId');
            $table->string('carName')->nullable();
            $table->string('lisencePlate')->nullable();
            $table->string('customerName');
            $table->string('customerPhone');
            $table->text('information')->nullable();
            $table->decimal('price', '10', '2');
            $table->dateTime('pickUpDate');
            $table->dateTime('returnDate');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('platId')
                ->references('id')
                ->on('lisence_plates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
};
