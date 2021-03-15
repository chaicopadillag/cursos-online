@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Observación del Curso</h1>
@stop

@section('content')
<h2 class="h2"><b>Curso:</b> {{$course->title}}</h2>
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>['dashboard.courses.reject',$course],'method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('body', 'Observación del Curso') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            @error('body')
            <span class="text-danger text-sm">
                {{$message}}
            </span>
            @enderror
        </div>
        {!! Form::submit('Rechazar el curso', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#body' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
</script>
@stop