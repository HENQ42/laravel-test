@extends('layouts.app')

@section('content')
    <h1>Gêneros</h1>
    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Novo Gênero</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection