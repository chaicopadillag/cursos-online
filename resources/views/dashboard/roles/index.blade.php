@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Lista de Roles</h1>
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
        <a href="{{route('dashboard.roles.create')}}">Crear Rol</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th colspan="2"></th>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td width="10px"><a href="{{route('dashboard.roles.edit',$role)}}" class="btn btn-secondary">Editar</a></td>
                    <td width="10px">
                        <form action="{{route('dashboard.roles.destroy',$role)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No hay roles que mostrar</td>
                </tr>
                @endforelse
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