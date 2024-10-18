<?php

use Database\Seeders\PokemonTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PokemonTableSeeder::class,
        ]);
    }
}
