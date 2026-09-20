<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = [
        ['title' => 'Pemrograman PHP', 'author' => 'Surya Insomnia', 'year' => '2024'],
        ['title' => 'Laravel untuk Pemula', 'author' => 'Budi Cadera', 'year' => 2021],
        ['title' => 'Basis Data', 'author' => 'Citra Wati', 'year' => 2018],
        ['title' => 'Algoritma dan Pemrograman', 'author' => 'Dewi Rahmat', 'year' => 2020],
        ['title' => 'Pemrograman Berorientasi Objek', 'author' => 'Eka In', 'year' => 2022],

        ];
    
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        return view('books.show', ['id' => $id]);
    }

}