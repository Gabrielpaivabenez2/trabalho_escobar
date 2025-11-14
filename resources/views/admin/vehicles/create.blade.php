@extends('layouts.app')
@section('title','Novo Veículo')
@section('content')
  <h1>Novo Veículo</h1>
  <form method="POST" action="{{ route('admin.vehicles.store') }}">
    @csrf
    <div class="row">
      <div class="col-md-4">
        <label>Marca</label>
        <select name="brand_id" id="brand" class="form-control" required>
          <option value="">Selecione</option>
          @foreach($brands as $b) <option value="{{ $b->id }}">{{ $b->name }}</option> @endforeach
        </select>
      </div>
      <div class="col-md-4">
        <label>Modelo</label>
        <select name="car_model_id" id="car_model" class="form-control" required></select>
      </div>
      <div class="col-md-4">
        <label>Cor</label>
        <select name="color_id" class="form-control" required>
          <option value="">Selecione</option>
          @foreach($colors as $c) <option value="{{ $c->id }}">{{ $c->name }}</option> @endforeach
        </select>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-3"><label>Ano</label><input type="number" name="year" class="form-control" required></div>
      <div class="col-md-3"><label>Quilometragem</label><input type="number" name="mileage" class="form-control" required></div>
      <div class="col-md-3"><label>Valor</label><input type="number" step="0.01" name="price" class="form-control" required></div>
    </div>

    <div class="mt-3">
      <label>Descrição</label>
      <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mt-3">
      <label>Fotos (URLs) — mínimo 3</label>
      <input type="url" name="photos[]" class="form-control mb-2" placeholder="https://...">
      <input type="url" name="photos[]" class="form-control mb-2" placeholder="https://...">
      <input type="url" name="photos[]" class="form-control mb-2" placeholder="https://...">
    </div>

    <div class="mt-3"><button class="btn btn-success">Salvar</button></div>
  </form>

  <script>
    // Carrega modelos via fetch quando marca é selecionada (rota API simples)
    document.getElementById('brand').addEventListener('change', async function(){
      const brandId = this.value;
      const sel = document.getElementById('car_model'); sel.innerHTML = '';
      if(!brandId) return;
      const res = await fetch('/api/brands/'+brandId+'/models');
      const json = await res.json();
      json.forEach(m => sel.append(new Option(m.name,m.id)));
    });
  </script>
@endsection
