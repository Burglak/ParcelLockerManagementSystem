<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\ParcelLocker;

class ParcelLockerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pobierz wszystkie miasta
        $cities = City::all();

        // Lista ulic
        $streets = [
            'Maja', 'Mickiewicza', 'Powstańców Warszawy', 'Sikorskiego',
            'Słowackiego', 'Sienkiewicza', 'Kościuszki', 'Paderewskiego',
            '3 Maja', 'Jana Pawła II', 'Świętojańska', 'Kopernika',
            'Długa', 'Słoneczna', 'Łazienna', 'Polna', 'Kwiatowa',
            'Klonowa', 'Ogrodowa', 'Leśna', 'Spacerowa', 'Wiosenna',
            'Kościelna', 'Rynek', 'Parkowa', 'Zamkowa', 'Sportowa',
            'Piastowska', 'Narutowicza', 'Wrocławska', 'Poznańska',
            'Warszawska', 'Krakowska', 'Gdańska', 'Łódzka', 'Katowicka',
            'Grunwaldzka', 'Armii Krajowej', 'Krótka', 'Wiejska',
            'Prusa', 'Świętego Floriana', 'Cicha', 'Nowa', 'Brzozowa'
        ];

        // Iteruj przez każde miasto
        foreach ($cities as $city) {
            // Twórz co najmniej dwa paczkomaty dla danego miasta
            for ($i = 1; $i <= 2; $i++) {
                // Losowo wybierz ulicę z listy ulic
                $street = $streets[array_rand($streets)];
                // Losowo wybierz numer paczkomatu od 1 do 49
                $number = mt_rand(1, 49);
                ParcelLocker::create([
                    'city_id' => $city->id,
                    'address' => "Paczkomat $i, ul. $street $number, $city->name",
                ]);
            }
        }
    }
}
