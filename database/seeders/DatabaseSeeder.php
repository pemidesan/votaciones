<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
        \App\Models\Vecino::factory(500)->create();
       \App\Models\Comunidad::factory(20)->create();
        // $this->call(TotalSeeder::class);
      \App\Models\Administrator::factory(5)->create();
     
    }
}
