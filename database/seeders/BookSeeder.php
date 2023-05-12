<?php

namespace Database\Seeders;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as fakers;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker=fakers::Create();
        for( $i=0; $i<5; $i++){
    $Book= new Book;
    $Book->name= $Faker->name;
    $Book->description= $Faker->paragraph();
    $Book->save();
    }
}
}