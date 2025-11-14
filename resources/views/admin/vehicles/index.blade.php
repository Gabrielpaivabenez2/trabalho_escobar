@extends('layouts.app')
@section('title','Admin - Veículos')
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Veículos</h1>
    <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary">Novo veículo</a>
  </div>
  <table class="table table-striped">
    <thead><tr><th>#</th><th>Marca/Modelo</th><th>Ano</th><th>KM</th><th>Valor</th><th>Ações</th></tr></thead>
    <tbody>
      @foreach($vehicles as $v)
        <tr>
          <td>{{ $v->id }}</td>
          <td>{{ $v->brand->name }} / {{ $v->carModel->name }}</td>
          <td>{{ $v->year }}</td>
          <td>{{ number_format($v->mileage,0,',','.') }}</td>
          <td>R$ {{ number_format($v->price,2,',','.') }}</td>
          <td>
            <a href="{{ route('admin.vehicles.edit', $v->id) }}" class="btn btn-sm btn-warning">Editar</a>
            <form method="POST" action="{{ route('admin.vehicles.destroy', $v->id) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button></form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $vehicles->links() }}
@endsection
