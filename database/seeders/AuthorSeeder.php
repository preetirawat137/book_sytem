<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as fakers;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = fakers::Create();
        for ($i = 0; $i < 5; $i++) {
            $author = new Author;
            $author->name = $Faker->name;
            $author->save();
        }
    }
}
