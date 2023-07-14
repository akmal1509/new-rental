<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'siteTitle' => 'VIP68-Luximo',
                'logo' => 'files/vvip69-real.png',
                'flatLogo' => 'files/vvip69-full-white.png',
                'icon' => 'files/vvip69-real.png',
                'currency' => 'USD',
                'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3319.2844840701696!2d150.5724289!3d-33.701586899999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b127d6645a5e81d%3A0x82126c8a5e107299!2sUnit%203%2F40%20Macquarie%20Rd%2C%20Springwood%20NSW%202777%2C%20Australia!5e0!3m2!1sid!2sid!4v1688162339503!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'email' => 'admin@vvip69luxlimo.com',
                'phone' => '+61424 124 324',
                'whatsapp' => '+61424 124 324',
                'copyright' => 'Copyright@ made by <b>akmal</b> 2022',
                'keyword' => NULL,
                'metaDescription' => NULL,
                'metaTitle' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}