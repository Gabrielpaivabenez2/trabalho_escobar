@extends('layouts.app')
@section('title','Veículos à venda')
@section('content')
  <h1 class="mb-4">Loja de carros</h1>
  <div class="row g-3">
    @foreach($vehicles as $v)
      <div class="col-md-4">
        <div class="card card-vehicle">
          <img src="{{ $v->photos[0] ?? 'https://via.placeholder.com/400x250?text=Sem+imagem' }}" class="card-img-top" alt="Foto">
          <div class="card-body">
            <h5 class="card-title">{{ $v->brand->name }} — {{ $v->carModel->name }}</h5>
            <p class="mb-1"><strong>Cor:</strong> {{ $v->color->name }}</p>
            <p class="mb-1"><strong>Ano:</strong> {{ $v->year }}</p>
            <p class="mb-1"><strong>KM:</strong> {{ number_format($v->mileage,0,',','.') }}</p>
            <p class="mb-2"><strong>Valor:</strong> R$ {{ number_format($v->price,2,',','.') }}</p>
            <a href="{{ route('public.show', $v->id) }}" class="btn btn-sm btn-primary">Ver detalhes</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="mt-4">{{ $vehicles->links() }}</div>
@endsection
