<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as fakers;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = fakers::Create();
        for ($i = 0; $i <5; $i++) {
            $category = new Category;
            $category->name = $Faker->name;
            $category->book_id = $Faker->numberBetween(1,5);
            $category->save();
        }
    }
}
