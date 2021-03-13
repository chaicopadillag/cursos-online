@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Creando un rol nuevo</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'dashboard.roles.store']) !!}
        @include('dashboard.roles.partials.form')
        {!! Form::submit('Registrar rol', ['class'=>'btn btn-primary mt-2']) !!}
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