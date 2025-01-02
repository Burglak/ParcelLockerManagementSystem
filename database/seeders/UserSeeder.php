<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Admin',
            'surname' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'address' => 'Admin Street 1',
            'phone_number' => '123456789',
            'type' => 'admin',
        ]);

        User::create([
            'name' => 'User1',
            'surname' => 'Regular1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'address' => 'User Street 1',
            'phone_number' => '987654321',
            'type' => 'user',
        ]);

        User::create([
            'name' => 'User2',
            'surname' => 'Regular2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'), 
            'address' => 'User Street 2',
            'phone_number' => '987654322',
            'type' => 'user',
        ]);

        User::create([
            'name' => 'Courier',
            'surname' => 'Fast',
            'email' => 'courier@example.com',
            'password' => Hash::make('password'), 
            'address' => 'Courier Street 1',
            'phone_number' => '123123123',
            'type' => 'courier',
        ]);
    }
}
