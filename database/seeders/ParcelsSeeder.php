<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parcels;

class ParcelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'sender_id' => 2, 
                'receiver_id' => 3,
                'courier_id' => 1,
                'start_locker_id' => 4, 
                'end_locker_id' => 10, 
                'name' => 'Paczka 1',
                'code' => uniqid(), 
                'description' => 'Opis paczki 1',
                'status_id' => 1,
                'type_id' => 1,
            ],
            [
                'sender_id' => 3,
                'receiver_id' => 2,
                'courier_id' => 1, 
                'start_locker_id' => 10, 
                'end_locker_id' => 4, 
                'name' => 'Paczka 2',
                'code' => uniqid(), 
                'description' => 'Opis paczki 2',
                'status_id' => 1, 
                'type_id' => 1, 
            ],

        ];


        foreach ($data as $parcelData) {
            Parcels::create($parcelData);
        }
    }
}