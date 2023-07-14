<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testimonials')->delete();
        
        \DB::table('testimonials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Charlie Hadson',
                'body' => '<p>With its luxurious vehicles, plush seats, cutting-edge amenities, and expert services, VVIP 69 LUX LIMO provides an exceptional experience. They come highly recommended if you want an outstanding encounter</p>',
                'image' => 'files/testimonial%2001.jpg',
                'deleted_at' => NULL,
                'created_at' => '2023-07-02 16:33:20',
                'updated_at' => '2023-07-02 16:33:20',
            ),
        ));
        
        
    }
}