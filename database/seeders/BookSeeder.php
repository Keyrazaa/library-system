<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Pemrograman PHP',
            'author' => 'Surya Insomnia',
            'year' => 2024,
            'stock' => 5,
        ]);

        Book::create([
            'title' => 'Laravel untuk Pemula',
            'author' => 'Budi Cadera',
            'year' => 2021,
            'stock' => 3,
        ]);

        Book::create([
            'title' => 'Basis Data',
            'author' => 'Citra Wati',
            'year' => 2018,
            'stock' => 7,
        ]);

        Book::create([
            'title' => 'Algoritma dan Pemrograman',
            'author' => 'Dewi Rahmat',
            'year' => 2020,
            'stock' => 4,
        ]);

        Book::create([
            'title' => 'Pemrograman Berorientasi Objek',
            'author' => 'Eka In',
            'year' => 2022,
            'stock' => 6,
        ]);
    }
}