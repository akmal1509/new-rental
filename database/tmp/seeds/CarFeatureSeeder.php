<?php

namespace Database\Seeders;

use App\Models\CarFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarFeature::create([
            'type' => 'Selectbox',
            'name' => 'Fuel',
            'value' => '["Patrol","Diesel"]',
            'icon' => '/files/mingcute_car-fill.png'
        ]);
        CarFeature::create([
            'type' => 'Text',
            'name' => 'Capacity',
            'value' => '',
            'suffix' => 'capacity',
            'icon' => '/files/mingcute_car-fill.png'
        ]);
    }
}
