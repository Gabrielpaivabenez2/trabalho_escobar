@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 420px; border-radius: 18px;">
        
        <h2 class="text-center mb-4 fw-bold">Acessar Painel</h2>

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    placeholder="seuemail@exemplo.com"
                    value="{{ old('email') }}"
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Senha</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    placeholder="********"
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button 
                type="submit" 
                class="btn w-100 mt-3 text-dark fw-bold"
                style="background: linear-gradient(90deg,#ff8a00,#ffd200); border-radius: 12px;"
            >
                Entrar
            </button>
        </form>

        <div class="text-center mt-3">
            <span>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></span>
        </div>

    </div>
</div>
@endsection
