@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h1>{{ $title }}</h1>

    <p>Judul: {{ $book->title }}</p>
    <p>Penulis: {{ $book->author }}</p>
    <p>Tahun: {{ $book->year }}</p>
    <p>Stok: {{ $book->stock }}</p>

    <a href="{{ route('books.index') }}">Kembali</a>
@endsection