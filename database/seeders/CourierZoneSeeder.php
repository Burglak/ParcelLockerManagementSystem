<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourierZone;

class CourierZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'description' => 'Strefa A',
                'city_id' => 1,
            ],
            [
                'description' => 'Strefa B',
                'city_id' => 2, 
            ],
        ];

        foreach ($data as $zoneData) {
            CourierZone::create($zoneData);
        }
    }
}
