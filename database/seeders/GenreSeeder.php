<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as fakers;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = fakers::Create();
        for ($i = 0; $i < 5; $i++) {
            $Genre = new Genre;
            $Genre->name = $Faker->name;
            $Genre->book_id = $Faker->numberBetween(1,5);
            $Genre->save();
        }
    }
}
