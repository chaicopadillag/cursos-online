@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Editar Rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($role,['route'=>['dashboard.roles.update',$role],'method'=>'PUT']) !!}
        @include('dashboard.roles.partials.form')
        {!! Form::submit('Actualizar rol', ['class'=>'btn btn-primary mt-2']) !!}
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