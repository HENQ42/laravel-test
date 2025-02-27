
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Bem-vindo ao Sistema de Biblioteca</h1>

    <!-- Cards de Estatísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Livros Cadastrados</h5>
                    <p class="card-text display-4">{{ $stats['total_books'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Livros Disponíveis</h5>
                    <p class="card-text display-4">{{ $stats['available_books'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Empréstimos Ativos</h5>
                    <p class="card-text display-4">{{ $stats['active_loans'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Empréstimos Atrasados</h5>
                    <p class="card-text display-4">{{ $stats['overdue_loans'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de Empréstimos Recentes -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Últimos Empréstimos</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Livro</th>
                        <th>Data de Empréstimo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentLoans as $loan)
                        <tr>
                            <td>{{ $loan->user->name }}</td>
                            <td>{{ $loan->book->name }}</td>
                            <td>{{ $loan->loan_date ? \Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') : '' }}</td>
                            <td>
                                <span class="badge bg-{{ $loan->status === 'overdue' ? 'danger' : 'warning' }}">
                                    {{ $loan->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nenhum empréstimo registrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection