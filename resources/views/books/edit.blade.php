@extends('layouts.app')

@section('title', 'Ubah Buku')

@section('content')
    <h1>{{ $title }}</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Judul Buku</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Penulis</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}">
            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="year" value="{{ old('year', $book->year) }}">
            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Stok Buku</label>
            <input type="number" name="stock" value="{{ old('stock', $book->stock) }}">
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Update</button>
    </form>
@endsection