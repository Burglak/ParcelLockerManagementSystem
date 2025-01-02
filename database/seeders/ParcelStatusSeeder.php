<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parcel_statuses')->insert([
            [
                'name' => 'W przygotowaniu',
            ],
            [
                'name' => 'Odebrana przez kuriera',
            ],
            [
                'name' => 'W drodze',
            ],
            [
                'name' => 'Czeka na odebranie',
            ],
            [
                'name' => 'W paczkomacie tymczasowym',
            ],
        ]);
    }
}
