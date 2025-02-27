<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with('user', 'book')->get();
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $books = Book::where('status', 'available')->get();
        return view('loans.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'due_date' => 'required|date|after:today'
        ]);

        $book = Book::find($request->book_id);
        
        // Verifica disponibilidade
        if ($book->status !== 'available') {
            return back()->withErrors(['book_id' => 'Este livro já está emprestado']);
        }

        // Cria o empréstimo
        Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => now(),
            'due_date' => $request->due_date
        ]);

        // Atualiza status do livro
        $book->update(['status' => 'borrowed']);

        return redirect()->route('loans.index')
                         ->with('success', 'Empréstimo registrado!');
    }

    public function markAsReturned(Loan $loan)
    {
        // Verifica se o empréstimo já foi devolvido
        if ($loan->status === 'returned') {
            return redirect()->route('loans.index')
                            ->with('error', 'Este empréstimo já foi devolvido.');
        }

        // Atualiza o status do empréstimo
        $loan->update([
            'return_date' => now(),
            'status' => 'returned'
        ]);

        // Libera o livro (atualiza status para "available")
        $loan->book->update(['status' => 'available']);

        return redirect()->route('loans.index')
                        ->with('success', 'Livro devolvido com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
