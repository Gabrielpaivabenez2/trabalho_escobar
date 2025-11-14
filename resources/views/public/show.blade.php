@extends('layouts.app')
@section('title', $vehicle->brand->name . ' ' . $vehicle->carModel->name)
@section('content')
  <div class="row">
    <div class="col-md-8">
      <div id="carouselPhotos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($vehicle->photos as $i => $photo)
            <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
              <img src="{{ $photo }}" class="d-block w-100" style="height:450px;object-fit:cover;">
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPhotos" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPhotos" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
      </div>
    </div>

    <div class="col-md-4">
      <h3>{{ $vehicle->brand->name }} {{ $vehicle->carModel->name }}</h3>
      <p><strong>Valor:</strong> R$ {{ number_format($vehicle->price,2,',','.') }}</p>
      <p><strong>Ano:</strong> {{ $vehicle->year }}</p>
      <p><strong>Quilometragem:</strong> {{ number_format($vehicle->mileage,0,',','.') }} km</p>
      <p><strong>Cor:</strong> {{ $vehicle->color->name }}</p>
      <hr>
      <h5>Descrição</h5>
      <p>{{ $vehicle->description ?? 'Sem descrição.' }}</p>
    </div>
  </div>
  <a href="{{ route('public.index') }}" class="btn btn-link mt-3">Voltar</a>
@endsection
