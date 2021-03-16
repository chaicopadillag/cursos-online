@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Editar Nivel</h1>
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
        <a href="{{route('dashboard.levels.index')}}" class="btn btn-primary">Lista de niveles</a>
    </div>
    <div class="card-body">
        {!! Form::model($level,['route'=>['dashboard.levels.update',$level],'method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del nivel']) !!}
            @error('name')
            <span class="text-danger text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('Actualizar nivel', ['class'=>'btn btn-success']) !!}
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