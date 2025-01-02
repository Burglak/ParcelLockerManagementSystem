<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Courier;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 4, 
                'courier_zone_id' => 2, 
            ],

        ];

        foreach ($data as $courierData) {
            Courier::create($courierData);
        }
    }
}
