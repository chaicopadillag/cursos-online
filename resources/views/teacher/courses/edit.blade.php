<x-teacher-layout :course="$course">
    <h2 class="text-2xl font-bold">Información del Curso</h2>
    <hr class="mt-2 mb-6">
    {!! Form::model($course, ['route'=>['teacher.courses.update',$course],'method'=>'PUT','files'=>true]) !!}
    @include('teacher.courses.partials.form')
    <div class="flex justify-end">
        {!! Form::submit('Actualizar curso', ['class'=>'btn btn-primary cursor-pointer']) !!}

    </div>
    {!! Form::close() !!}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/teacher/courses/form.js')}}"></script>
    </x-slot>
</x-teacher-layout>