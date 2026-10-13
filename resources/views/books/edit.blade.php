@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>{{ $title }}</h1>
    
    <form action="{{ route('books.update', $book) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $book->title }}">
    <input type="text" name="author" value="{{ $book->author }}">
    <input type="number" name="year" value="{{ $book->year }}">
    <input type="number" name="stock" value="{{ $book->stock }}">

    <button type="submit">
        Update
    </button>
</form>


@endsection