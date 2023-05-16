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
    $Book->image=$Faker->imageUrl($width = 640, $height = 480, 'books');
    $Book->description= $Faker->paragraph();
    $Book->author_id= $Faker->numberBetween(1,5); 
    $Book->save();
    }
}
}