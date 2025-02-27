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
    <h1>Adicionar Biblioteca</h1>
    <form action="{{ route('libraries.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="registration_number" class="form-label">Número de Cadastro</label>
            <input type="text" class="form-control" id="registration_number" name="registration_number" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection