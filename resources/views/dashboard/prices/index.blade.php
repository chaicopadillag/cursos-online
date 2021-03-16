@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Lista de Precios</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Muy bien!</strong> {{session('success')}}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Ups... Algo salio mal!</strong> {{session('error')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <a href="{{route('dashboard.prices.create')}}" class="btn btn-primary">Agregar precio</a>
    </div>
    <div class="card body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                <tr>
                    <td>{{$price->id}}</td>
                    <td>{{$price->name}}</td>
                    <td>{{$price->value}}</td>
                    <td width="100px"><a href="{{route('dashboard.prices.edit',$price)}}" class="btn btn-primary">Editar</a></td>
                    <td width="100px">
                        <form method="POST" action="{{route('dashboard.prices.destroy',$price)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop