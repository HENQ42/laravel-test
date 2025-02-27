@extends('layouts.app')

@section('content')
    <h1>Bibliotecas</h1>
    <a href="{{ route('libraries.create') }}" class="btn btn-primary mb-3">Nova Biblioteca</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Número de Cadastro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libraries as $library)
                <tr>
                    <td>{{ $library->name }}</td>
                    <td>{{ $library->email }}</td>
                    <td>{{ $library->registration_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection