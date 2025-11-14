@extends('layouts.app')
@section('title','Editar Veículo')
@section('content')
  <h1>Editar Veículo</h1>
  <form method="POST" action="{{ route('admin.vehicles.update', $vehicle->id) }}">
    @csrf @method('PUT')
    <div class="row">
      <div class="col-md-4">
        <label>Marca</label>
        <select name="brand_id" id="brand" class="form-control" required>
          <option value="">Selecione</option>
          @foreach($brands as $b) <option value="{{ $b->id }}" {{ $vehicle->brand_id== $b->id? 'selected':'' }}>{{ $b->name }}</option> @endforeach
        </select>
      </div>
      <div class="col-md-4">
        <label>Modelo</label>
        <select name="car_model_id" id="car_model" class="form-control" required>
          @foreach($models as $m) <option value="{{ $m->id }}" {{ $vehicle->car_model_id==$m->id?'selected':'' }}>{{ $m->name }}</option> @endforeach
        </select>
      </div>
      <div class="col-md-4">
        <label>Cor</label>
        <select name="color_id" class="form-control" required>
          <option value="">Selecione</option>
          @foreach($colors as $c) <option value="{{ $c->id }}" {{ $vehicle->color_id==$c->id?'selected':'' }}>{{ $c->name }}</option> @endforeach
        </select>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-3"><label>Ano</label><input type="number" name="year" class="form-control" value="{{ $vehicle->year }}" required></div>
      <div class="col-md-3"><label>Quilometragem</label><input type="number" name="mileage" class="form-control" value="{{ $vehicle->mileage }}" required></div>
      <div class="col-md-3"><label>Valor</label><input type="number" step="0.01" name="price" class="form-control" value="{{ $vehicle->price }}" required></div>
    </div>

    <div class="mt-3">
      <label>Descrição</label>
      <textarea name="description" class="form-control">{{ $vehicle->description }}</textarea>
    </div>

    <div class="mt-3">
      <label>Fotos (URLs) — mínimo 3</label>
      @php $photos = $vehicle->photos ?? [] @endphp
      @for($i=0;$i<3;$i++)
        <input type="url" name="photos[]" class="form-control mb-2" value="{{ $photos[$i] ?? '' }}">
      @endfor
    </div>

    <div class="mt-3"><button class="btn btn-success">Salvar</button></div>
  </form>

  <script>
    // Carrega modelos quando marca muda
    document.getElementById('brand').addEventListener('change', async function(){
      const brandId = this.value; const sel = document.getElementById('car_model'); sel.innerHTML = '';
      const res = await fetch('/api/brands/'+brandId+'/models');
      const json = await res.json();
      json.forEach(m => sel.append(new Option(m.name,m.id)));
    });
  </script>
@endsection
