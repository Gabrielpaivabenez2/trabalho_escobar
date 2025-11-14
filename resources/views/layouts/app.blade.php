<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Venda de Veículos')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .brand-color { background: linear-gradient(90deg,#ff8a00,#ffd200); }
    .card-vehicle img { width:100%; height:180px; object-fit:cover; }
  </style>
  @yield('head')
</head>
<body>
<nav class="navbar navbar-expand-lg brand-color">
  <div class="container">
    <a class="navbar-brand text-dark fw-bold" href="{{ route('public.index') }}">Venda de Veículos</a>
    <div class="d-flex">
      @auth
        <a class="btn btn-sm btn-outline-dark me-2" href="{{ route('admin.vehicles.index') }}">Admin</a>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-sm btn-dark">Sair</button>
        </form>

      @else
        <a class="btn btn-sm btn-dark" href="{{ route('login') }}">Entrar</a>
      @endauth
    </div>
  </div>
</nav>

<main class="container py-4">
  @if(session('success')) 
    <div class="alert alert-success">{{ session('success') }}</div> 
  @endif

  @yield('content')
</main>

<footer class="text-center py-3">&copy; {{ date('Y') }} Venda de Veículos</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
