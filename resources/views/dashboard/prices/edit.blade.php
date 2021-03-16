@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Actualizar precio</h1>
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
        <a href="{{route('dashboard.prices.index')}}" class="btn btn-primary">Lista de precios</a>
    </div>
    <div class="card-body">
        {!! Form::model($price,['route'=>['dashboard.prices.update',$price],'method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del precio']) !!}
            @error('name')
            <span class="text-danger text-sm">{{$message}}</span>
            @enderror
            {!! Form::label('value', 'Precio') !!}
            {!! Form::number('value', null, ['class'=>'form-control','placeholder'=>'Ingrese el precio']) !!}
            @error('value')
            <span class="text-danger text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('Actualizar precio', ['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
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