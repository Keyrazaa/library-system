@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    
    <h1>{{ $title }}</h1>

    <a href="{{ route('books.create') }}">Tambah Buku</a>
    <hr>

    @foreach($books as $book)
        <h3>{{ $book->title }}</h3>
        <p>Penulis: {{ $book->author }}</p>
        <p>Kategori: {{ $book->category?->name ?? 'Belum ada kategori' }}</p>
        <p>Tahun: {{ $book->year }}</p>
        <p>Stok: {{ $book->stock }}</p>

        <a href="{{ route('books.show', $book) }}">Detail</a> |
        <a href="{{ route('books.edit', $book) }}">Edit</a>

        <form action="{{ route('books.destroy', $book) }}" method="POST"
            onsubmit="return confirm('Ingin menghapus buku ini?')">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
        <hr>

    @endforeach
@endsection