<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'total_books' => Book::count(),
            'available_books' => Book::where('status', 'available')->count(),
            'active_loans' => Loan::whereIn('status', ['pending', 'overdue'])->count(),
            'overdue_loans' => Loan::where('status', 'overdue')->count()
        ];

        $recentLoans = Loan::with(['user', 'book'])
            ->latest()
            ->take(5)
            ->get();

        return view('home', compact('stats', 'recentLoans'));
    }

}
