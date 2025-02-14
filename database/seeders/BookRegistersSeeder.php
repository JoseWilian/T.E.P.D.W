<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookRegistersSeeder extends Seeder
{
    public function run()
    {
        DB::table('authors')->truncate();
        DB::table('books')->truncate();
        DB::table('publishers')->truncate();
        DB::table('copies')->truncate();
        $faker = Faker::create();

        $author1 = Author::create(attributes: [
            'name' => "Memphis Depay",
        ]);
        $author2 = Author::create(attributes: [
            'name' => "Neymar",

        ]);
        $author3 = Author::create(attributes: [
            'name' => "Orea Seca",

        ]);

        $publisher1 = Publisher::create(attributes: [
            'name' => "Companhia das Letras",
        ]);
        $publisher2 = Publisher::create(attributes: [
            'name' => "Grupo Editorial Record",
        ]);


        for ($i = 0; $i < 5; $i++) {
            $book_temp = Book::create([
                'title' => $faker->sentence(3),
                'publication_date' => $faker->date(),
                'genre' => $faker->word,
                'sale_value' => $faker->randomFloat(2, 10, 100),
                'purchased_value' => $faker->randomFloat(2, 5, 80),
                //'image_path' => $faker->imageUrl(640, 480, 'books', true),
            ]);

            $publisher_temp = Publisher::create(attributes: [
                'name' => $faker->company(),
            ]);
            $author_temp = Author::create(attributes: [
                'name' => $faker->name(),
            ]);

            $book_temp->publishers()->attach($publisher_temp->id);
            $book_temp->authors()->attach($author_temp->id);

            for ($j = 0; $j < 3; $j++) {
                $book_temp->copies()->create([
                    'isbn' => $faker->unique()->isbn13,
                    'is_available' => true,
                ]);
            }
        }
    }
}
