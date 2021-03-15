@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Cursos pendientes de aprobación</h1>
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
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Categoria</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->category->name}}</td>
                    <td><a href="{{route('dashboard.courses.show',$course)}}" class="btn btn-primary">Revisar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$courses->links('vendor.pagination.bootstrap-4')}}
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