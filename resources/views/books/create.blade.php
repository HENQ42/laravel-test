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
    <h1>Adicionar Livro</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="mb-3">
            <label for="registration_number" class="form-label">Número de Registro</label>
            <input type="text" class="form-control" id="registration_number" name="registration_number" required>
        </div>
        <div class="mb-3">
            <label for="library_id" class="form-label">Biblioteca</label>
            <select class="form-control" id="library_id" name="library_id" required>
                @foreach ($libraries as $library)
                    <option value="{{ $library->id }}">{{ $library->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="genres" class="form-label">Gêneros</label>
            <select class="form-control" id="genres" name="genres[]" multiple required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection