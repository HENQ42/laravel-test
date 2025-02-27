@extends('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    <h1>Novo Empréstimo</h1>
    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuário</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="book_id" class="form-label">Livro</label>
            <select class="form-control" id="book_id" name="book_id" required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Data de Devolução</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection