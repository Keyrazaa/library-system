@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h1>{{ $title }}</h1>
    
    <form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div>
        <label>Judul Buku</label>
        <input
            type="text" 
            name="title" 
            value="{{ old('title') }}">
            
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Penulis</label>
        <input
            type="text"
            name="author"
            value="{{ old('title') }}"
        >
        @error('author')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Tahun Terbit</label>
        <input
            type="number"
            name="year"
            value="{{ old('title') }}"
        >
        @error('year')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Stok Buku</label>
        <input
            type="number"
            name="stock"
            value="{{ old('title') }}"
        >
        @error('stock')
            <p>{{ $message }}</p>
        @enderror
    </div>
    
    <button type="submit">
        Simpan
    </button>
</form>

@endsection