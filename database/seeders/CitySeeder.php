<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Warszawa', 'zip_code' => '00-001'], // Mazowieckie
            ['name' => 'Białystok', 'zip_code' => '15-001'], // Podlaskie
            ['name' => 'Bydgoszcz', 'zip_code' => '85-001'], // Kujawsko-Pomorskie
            ['name' => 'Gdańsk', 'zip_code' => '80-001'], // Pomorskie
            ['name' => 'Gorzów Wielkopolski', 'zip_code' => '65-001'], // Lubuskie
            ['name' => 'Katowice', 'zip_code' => '40-001'], // Śląskie
            ['name' => 'Kielce', 'zip_code' => '25-001'], // Świętokrzyskie
            ['name' => 'Kraków', 'zip_code' => '30-001'], // Małopolskie
            ['name' => 'Lublin', 'zip_code' => '20-001'], // Lubelskie
            ['name' => 'Łódź', 'zip_code' => '90-001'], // Łódzkie
            ['name' => 'Olsztyn', 'zip_code' => '10-001'], // Warmińsko-Mazurskie
            ['name' => 'Opole', 'zip_code' => '45-001'], // Opolskie
            ['name' => 'Poznań', 'zip_code' => '60-001'], // Wielkopolskie
            ['name' => 'Rzeszów', 'zip_code' => '35-001'], // Podkarpackie
            ['name' => 'Szczecin', 'zip_code' => '70-001'], // Zachodniopomorskie
            ['name' => 'Toruń', 'zip_code' => '87-100'], // Kujawsko-Pomorskie
            ['name' => 'Warszawa', 'zip_code' => '02-001'], // Mazowieckie
            ['name' => 'Wrocław', 'zip_code' => '50-001'], // Dolnośląskie
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert($city);
        }
    }
}
