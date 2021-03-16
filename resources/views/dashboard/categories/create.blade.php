@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Crear nueva categoria</h1>
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
        <a href="{{route('dashboard.categories.index')}}" class="btn btn-primary">Lista de categorias</a>
    </div>
    <div class="card-body">
        {!! Form::open(['route'=>'dashboard.categories.store','method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la categoria']) !!}
            @error('name')
            <span class="text-danger text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('Crear categoria', ['class'=>'btn btn-success']) !!}
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