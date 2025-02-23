<?php

namespace Database\Seeders;

use App\Models\Chat;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Albun;
use App\Models\Banda;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(50)->create();
        Banda::factory(50)->create();
        Albun::factory(200)->create();
        Chat::factory(100)->create();


        $this->call([
            UserSeeder::class
        ]);


    }
}
