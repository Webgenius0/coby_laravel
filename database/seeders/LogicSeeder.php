<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('logics')->insert([
            [
                'multi_trip_standard' => 2,
                'multi_trip_extended' => 2,
                'cancellation_coverage_standard' => 2,
                'cancellation_coverage_increased' => 2,
                'winter_sprots' => 2,
                'adventure_sprots_multi' => 2,
                'adventure_sprots_single' => 2,
                'charge' => 2,
                'usd_to_gbp' => 0.8
            ]
        ]);
    }
}
