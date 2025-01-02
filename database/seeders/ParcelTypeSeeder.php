<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        DB::table('parcel_types')->insert([
            [
                'name' => 'Mała paczka',
                'price' => '7zł',
                'weight' => '1kg',
                'dimensions' => '10x30x70cm',
            ],
            [
                'name' => 'Średnia paczka',
                'price' => '12zł',
                'weight' => '5kg',
                'dimensions' => '20x40x80cm',
            ],
            [
                'name' => 'Duża paczka',
                'price' => '20zł',
                'weight' => '10kg',
                'dimensions' => '30x50x90cm',
            ],
            [
                'name' => 'Bardzo duża paczka',
                'price' => '30zł',
                'weight' => '15kg',
                'dimensions' => '40x60x100cm',
            ],
        ]);
    }
}
