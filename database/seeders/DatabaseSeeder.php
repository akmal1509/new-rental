<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Laravolt\Indonesia\Seeds\DatabaseSeeder as Laravolt;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserRolePermissionSeeder::class,
            MenusTableSeeder::class,
            CarsTableSeeder::class,
            SettingsTableSeeder::class,
            TestimonialsTableSeeder::class,
            ServiceFrontTableSeeder::class
            // LocationSeeder::class
            // CarFeatureSeeder::class,
            // Laravolt::class,
        ]);
    }
}
