<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('cars')->delete();

        \DB::table('cars')->insert(array(
            0 =>
            array(
                'id' => 5,
                'userId' => 1,
                'name' => 'LEXUS RX450HL SPORT LUXURY',
                'slug' => 'lexus-rx450hl-sport-luxury-2',
                'body' => '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>',
                'price' => '0.00',
                'image' => 'files/car-Lexus%20Rx450H%20f%20sport-01%20A.jpg',
                'keyword' => NULL,
                'metaDescription' => NULL,
                'metaTitle' => NULL,
                'isActive' => 1,
                'created_at' => '2023-07-01 04:24:42',
                'updated_at' => '2023-07-02 06:37:55',
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'id' => 6,
                'userId' => 1,
                'name' => 'MERCEDES BENZ GLE',
                'slug' => 'mercedes-benz-gle',
                'body' => '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>',
                'price' => '0.00',
                'image' => 'files/car-Mercedes%20benz%20GLE-01%20(1)A.jpg',
                'keyword' => NULL,
                'metaDescription' => NULL,
                'metaTitle' => NULL,
                'isActive' => 1,
                'created_at' => '2023-07-01 04:28:22',
                'updated_at' => '2023-07-02 06:08:23',
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'id' => 7,
                'userId' => 1,
                'name' => 'Lexus Nx350h sport luxury',
                'slug' => 'lexus-nx350h-sport-luxury-2',
                'body' => '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>',
                'price' => '0.00',
                'image' => 'files/2022-Lexus-NX-350h-Sports-Luxury-suv-white-1001x565-(1).jpg',
                'keyword' => NULL,
                'metaDescription' => NULL,
                'metaTitle' => NULL,
                'isActive' => 1,
                'created_at' => '2023-07-01 04:31:27',
                'updated_at' => '2023-07-02 06:45:10',
                'deleted_at' => NULL,
            ),
            3 =>
            array(
                'id' => 8,
                'userId' => 1,
                'name' => 'Tesla Model Y',
                'slug' => 'tesla-model-y',
                'body' => '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>',
                'price' => '0.00',
                'image' => 'files/WhatsApp%20Image%202023-06-26%20at%2017_02_43.jpg',
                'keyword' => NULL,
                'metaDescription' => NULL,
                'metaTitle' => NULL,
                'isActive' => 1,
                'created_at' => '2023-07-01 04:32:44',
                'updated_at' => '2023-07-01 04:32:44',
                'deleted_at' => NULL,
            ),
            4 =>
            array(
                'id' => 9,
                'userId' => 1,
                'name' => 'MERCEDES BEN V300D',
                'slug' => 'mercedes-ben-v300d',
                'body' => '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>',
                'price' => '0.00',
                'image' => 'files/car-Mercedes%20benz%20v300d-01.jpg',
                'keyword' => NULL,
                'metaDescription' => NULL,
                'metaTitle' => NULL,
                'isActive' => 1,
                'created_at' => '2023-07-01 04:34:41',
                'updated_at' => '2023-07-02 06:11:36',
                'deleted_at' => NULL,
            ),
        ));
    }
}
