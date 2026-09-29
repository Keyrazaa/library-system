@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>
    <ul>
        @foreach($books as $book)
            <li>
                {{ $book->title }} — {{ $book->author }} ({{ $book->year }}) — Stok: {{ $book->stock }}
            </li>
        @endforeach
    </ul>
@endsection