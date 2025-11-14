@extends('layouts.app')

@section('title', 'Dashboard')

@section('head')
<style>
    .card-dashboard {
        border-radius: 1rem;
        transition: transform 0.2s;
        cursor: pointer;
    }
    .card-dashboard:hover {
        transform: scale(1.05);
    }
    .card-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    .bg-gradient-brand {
        background: linear-gradient(90deg,#ff8a00,#ffd200);
        color: #000;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">Painel Administrativo</h1>
    <p>Bem-vindo, <strong>{{ auth()->user()->name }}</strong>!</p>

    <div class="row g-4 mt-3">

        <div class="col-md-3">
            <a href="{{ route('admin.vehicles.index') }}" class="text-decoration-none">
                <div class="card card-dashboard text-center bg-light py-4">
                    <div class="card-icon text-primary">
                        <i class="bi bi-car-front-fill"></i>
                    </div>
                    <h5 class="card-title">Veículos</h5>
                    <p class="text-muted">{{ \App\Models\Vehicle::count() }} cadastrados</p>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('admin.brands.index') }}" class="text-decoration-none">
                <div class="card card-dashboard text-center bg-light py-4">
                    <div class="card-icon text-warning">
                        <i class="bi bi-bookmark-star-fill"></i>
                    </div>
                    <h5 class="card-title">Marcas</h5>
                    <p class="text-muted">{{ \App\Models\Brand::count() }} cadastradas</p>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('admin.car-models.index') }}" class="text-decoration-none">
                <div class="card card-dashboard text-center bg-light py-4">
                    <div class="card-icon text-success">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    <h5 class="card-title">Modelos</h5>
                    <p class="text-muted">{{ \App\Models\CarModel::count() }} cadastrados</p>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('admin.colors.index') }}" class="text-decoration-none">
                <div class="card card-dashboard text-center bg-light py-4">
                    <div class="card-icon text-info">
                        <i class="bi bi-palette-fill"></i>
                    </div>
                    <h5 class="card-title">Cores</h5>
                    <p class="text-muted">{{ \App\Models\Color::count() }} cadastradas</p>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
