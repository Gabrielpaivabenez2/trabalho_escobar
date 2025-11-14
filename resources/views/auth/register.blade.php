@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <h2 class="mb-3">Cadastro</h2>
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Confirmar Senha</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button class="btn btn-success w-100">Cadastrar</button>
        </form>
        <p class="mt-3 text-center">
            Já tem conta? <a href="{{ route('login') }}">Entre aqui</a>
        </p>
    </div>
</div>
@endsection
