<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('siteTitle');
            $table->string('logo');
            $table->string('flatLogo');
            $table->string('icon');
            $table->string('currency')->default('USD');
            $table->text('maps');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('copyright');
            $table->string('keyword')->nullable();
            $table->text('metaDescription')->nullable();
            $table->string('metaTitle')->nullable();

            $table->timestamps();
        });
        DB::table('settings')->insert(
            array(
                'siteTitle' => 'VIP68-Luximo',
                'logo' => 'files/vvip69-real.png',
                'flatLogo' => 'files/vvip69-full-white.png',
                'icon' => 'files/vvip69-real.png',
                'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.188470412517!2d106.8134591!3d-6.2575238!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f15051e32283%3A0x471b366331cf9263!2sJasa%20Pembuatan%20Website%20Murah%20Jakarta%20Selatan%20-%20digisupport.id!5e0!3m2!1sid!2sid!4v1687291373853!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'email' => 'zainnoeryadie@gmail.com',
                'phone' => '81290560851',
                'whatsapp' => '81290560851',
                'copyright' => 'Copyright@ made by <b>akmal</b> 2022',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
