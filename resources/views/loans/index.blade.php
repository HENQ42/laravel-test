@extends('layouts.app')

@section('content')
    <h1>Empréstimos</h1>
    <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Novo Empréstimo</a>
    <table class="table">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Livro</th>
                <th>Data de Empréstimo</th>
                <th>Data de Devolução</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->book->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($loan->due_date)->format('d/m/Y') }}</td>
                    <td>
                        @if ($loan->status === 'pending')
                            <span class="badge bg-warning">Pendente</span>
                        @elseif ($loan->status === 'returned')
                            <span class="badge bg-success">Devolvido</span>
                        @elseif ($loan->status === 'overdue')
                            <span class="badge bg-danger">Atrasado</span>
                        @endif
                    </td>
                    <td>
                        @if ($loan->status === 'pending')
                            <form action="{{ route('loans.return', $loan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">Marcar como Devolvido</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection