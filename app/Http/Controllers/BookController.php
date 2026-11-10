<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Daftar Buku";
        $books = Book::with('category')->get();
        
        return view('books.index', compact('title', 'books'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Buku";
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => ['required', 'string', 'min:3', 'max:255', 'unique:books,title'],
            'author' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.\,\-]+$/u'],
            'year'   => ['required', 'integer', 'digits:4', 'min:1901', 'max:' . date('Y')],
            'stock'  => ['required', 'integer', 'min:0', 'max:1000'],
            'category_id' => ['required', 'exists:categories,id'],
        ], $this->messages());

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $title ="Detail Buku";

        return view('books.show', compact('title', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $title = "Ubah Buku";
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('title', 'book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
         $validated = $request->validate([
            'title'  => ['required', 'string', 'min:3', 'max:255', Rule::unique('books', 'title')->ignore($book->id)],
            'author' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\.\,\-]+$/u'],
            'year'   => ['required', 'integer', 'digits:4', 'min:1901', 'max:' . date('Y')],
            'stock'  => ['required', 'integer', 'min:0', 'max:1000'],
            'category_id' => ['required', 'exists:categories,id'],
        ], $this->messages());

        $book->update($validated);

        return redirect()->route('books.index')
        ->with('success', 'Data buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }

    private function messages(): array
        {
        return [
            'title.required'  => 'Judul buku wajib diisi.',
            'title.min'       => 'Judul buku minimal 3 karakter.',
            'title.max'       => 'Judul buku maksimal 255 karakter.',
            'title.unique'    => 'Judul buku sudah terdaftar.',
            'author.required' => 'Nama penulis wajib diisi.',
            'author.min'      => 'Nama penulis minimal 3 karakter.',
            'author.regex'    => 'Nama penulis hanya boleh berisi huruf, spasi, titik, koma, dan tanda hubung.',
            'year.required'   => 'Tahun terbit wajib diisi.',
            'year.integer'    => 'Tahun terbit harus berupa angka bulat.',
            'year.digits'     => 'Tahun terbit harus terdiri dari 4 digit.',
            'year.min'        => 'Tahun terbit minimal 1901.',
            'year.max'        => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'stock.required'  => 'Stok buku wajib diisi.',
            'stock.integer'   => 'Stok buku harus berupa angka bulat.',
            'stock.min'       => 'Stok buku tidak boleh negatif.',
            'stock.max'       => 'Stok buku maksimal 1000.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak tersedia.',
            ];
    }
}
