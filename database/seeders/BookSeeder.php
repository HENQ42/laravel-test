<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Library;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $library = Library::first(); // Pega a primeira biblioteca criada

        $book = Book::create([
            'name' => 'Dom Casmurro',
            'author' => 'Machado de Assis',
            'registration_number' => 'LIV-001',
            'library_id' => $library->id,
            'status' => 'available'
        ]);

        // Adiciona gêneros ao livro
        $book->genres()->attach([1, 2]); // Ficção e Romance
    }
}
