@extends('layouts.app')

@section('content')
    <h1>Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Novo Livro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Autor</th>
                <th>Número de Registro</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->registration_number }}</td>
                    <td>{{ $book->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection