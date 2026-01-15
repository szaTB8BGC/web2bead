<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\NationalPark;
use App\Models\Settlement;
use App\Models\Trail;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

    $this->call(ImportTxtSeeder::class);

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );
       
        // Regisztrált felhasználó
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Teszt Felhasználó',
                'password' => bcrypt('user123'),
                'role' => 'user',
            ]
        );
    }
}
