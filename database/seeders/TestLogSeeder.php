<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\CustomLog;
use App\Models\Location;
use Illuminate\Database\Seeder;

class TestLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CustomLog::whereNotIn('id', ['7', '8'])->delete();
        Booking::truncate();
        // for ($i = 0; $i < 1000; $i++) {
        //     $new = $data->replicate();
        //     $new->save();
        // };

    }
}
