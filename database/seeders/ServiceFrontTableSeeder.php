<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceFrontTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_front')->delete();
        
        \DB::table('service_front')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Airport Transfers',
                'body' => '<p>Elevate your airport experience with our premier transfers. Join our satisfied customers and indulge in VIP treatment, traveling in luxurious limousines with experienced chauffeurs. Arrive at the airport with the epitome of style and luxury.</p>',
                'order' => NULL,
                'image' => 'files/Airport%20Transfers.jpg',
                'deleted_at' => NULL,
                'created_at' => '2023-07-01 05:56:11',
                'updated_at' => '2023-07-01 21:21:12',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Business Transportation',
                'body' => '<p>Enrich your business’s brand value with our luxury limousines and embody class in your professional endeavors. Arrive at every destination with grace and elegance, leaving a lasting impression.</p>',
                'order' => NULL,
                'image' => 'files/Business%20Transportation.jpg',
                'deleted_at' => NULL,
                'created_at' => '2023-07-01 06:00:22',
                'updated_at' => '2023-07-01 21:20:20',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Special Occasions',
                'body' => '<p>Make your special occasions unforgettable with our exclusive services. From birthdays to proms, cruise terminals to race days. Enjoy the ultimate convenience of door-to-door service with our limousine. Skip the stress of traffic, directions, and transportation logistics. Sit back, relax, and let our experienced chauffeurs handle the details for a smooth and effortless journey to your destination.</p>',
                'order' => NULL,
                'image' => 'files/11062b_3205c2834eb541f997a021253211ac2c~mv2.jpg',
                'deleted_at' => '2023-07-01 06:19:16',
                'created_at' => '2023-07-01 06:01:51',
                'updated_at' => '2023-07-01 06:19:16',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Special Occasions',
                'body' => '<p>Make your special occasions unforgettable with our exclusive services. From birthdays to proms, cruise terminals to race days. Enjoy the ultimate convenience of door-to-door service with our limousine. Skip the stress of traffic, directions, and transportation logistics. Sit back, relax, and let our experienced chauffeurs handle the details for a smooth and effortless journey to your destination.</p>',
                'order' => NULL,
                'image' => 'files/11062b_3205c2834eb541f997a021253211ac2c~mv2.jpg',
                'deleted_at' => '2023-07-01 06:19:22',
                'created_at' => '2023-07-01 06:01:54',
                'updated_at' => '2023-07-01 06:19:22',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Special Occasions',
                'body' => '<p>Make your special occasions unforgettable with our exclusive services. From birthdays to proms, cruise terminals to race days. Enjoy the ultimate convenience of door-to-door service with our limousine. Skip the stress of traffic, directions, and transportation logistics. Sit back, relax, and let our experienced chauffeurs handle the details for a smooth and effortless journey to your destination.</p>',
                'order' => NULL,
                'image' => 'files/Special%20Occasions.jpg',
                'deleted_at' => NULL,
                'created_at' => '2023-07-01 06:02:28',
                'updated_at' => '2023-07-01 21:19:46',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Weddings',
                'body' => '<p>At VVIP 69 LUX LIMO, we believe in crafting extraordinary weddings that are destined to be cherished forever. With our iconic fleet of meticulously maintained cars and exceptional chauffeurs, we go the extra mile to create a grand and unforgettable experience for your special day. Allow us to etch special memories in your heart.</p>',
                'order' => NULL,
                'image' => 'files/Wedding.jpg',
                'deleted_at' => NULL,
                'created_at' => '2023-07-01 06:02:51',
                'updated_at' => '2023-07-01 21:18:56',
            ),
        ));
        
        
    }
}